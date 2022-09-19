<?php

namespace IgniterLabs\MultiVendor\Classes;

use Admin\Actions\LocationAwareController;
use Admin\Classes\AdminController;
use Admin\Controllers\Customers;
use Admin\Controllers\Locations;
use Admin\Controllers\Menus;
use Admin\Controllers\Orders;
use Admin\Facades\AdminAuth;
use Admin\Facades\AdminLocation;
use Admin\Models\Customers_model;
use Admin\Models\Locations_model;
use Admin\Models\Menus_model;
use Admin\Models\Orders_model;
use Admin\Models\Payments_model;
use Admin\Models\Staffs_model;
use Admin\Widgets\Form;
use Admin\Widgets\Lists;
use Admin\Widgets\Toolbar;
use Igniter\Flame\Database\Model;
use Igniter\Flame\Exception\ApplicationException;
use Igniter\Flame\Traits\Singleton;
use Igniter\Local\Facades\Location;
use IgniterLabs\MultiVendor\Actions\Revisionable;
use IgniterLabs\MultiVendor\Models\Commission;
use IgniterLabs\MultiVendor\Models\CommissionRule;
use IgniterLabs\MultiVendor\Models\Cuisine;
use IgniterLabs\MultiVendor\Models\Settings;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Event;
use System\Classes\ExtensionManager;

class Manager
{
    use Singleton;

    public function boot()
    {
        if (!Settings::isConfigured())
            return;

        $this->extendMenusModel();
        $this->extendMenusToolbar();

        $this->extendLocationsModel();
        $this->extendLocationsFormField();
        $this->extendLocationableModels();
        $this->disableLocationableAbsenceConstraint();

        $this->extendStaffsModel();

        $this->addPaymentEditorFormField();
        $this->hideOrderDetailsFormFields();

        $this->overridePaymentSettings();
        $this->overrideMediaConfiguration();

        $this->bindCreateCommissionEvent();

        $this->extendCustomersListAndFormQueries();

        Relation::morphMap([
            'cuisines' => \IgniterLabs\MultiVendor\Models\Cuisine::class,
            'vendors' => \IgniterLabs\MultiVendor\Models\Vendor::class,
            'commissions' => \IgniterLabs\MultiVendor\Models\Commission::class,
            'commission_rules' => CommissionRule::class,
        ]);
    }

    //
    //
    //

    protected function overrideMediaConfiguration()
    {
        AdminController::extend(function ($controller) {
            $controller->bindEvent('controller.beforeConstructor', function ($controller) {
                if (!$vendor = Vendor::instance()->current())
                    return;

                $folder = Config::get('system.assets.media.folder');
                $path = Config::get('system.assets.media.path');

                Config::set('system.assets.media.folder', $folder.'/'.str_slug($vendor->name));
                Config::set('system.assets.media.path', $path.'/'.str_slug($vendor->name));
            });
        });
    }

    protected function hideOrderDetailsFormFields()
    {
        Orders::extendFormFields(function (Form $form, $model, $context) {
            if (!$model instanceof Orders_model)
                return;

            if (!isset($form->tabs['fields']['status_history']))
                return;

            if (Settings::hideCustomerDetails()) {
                $form->removeField('customer[full_name]');
                $form->removeField('telephone');
            }

            if (Settings::hidePaymentDetails()) {
                $form->removeField('payment_method[name]');
            }
        });
    }

    //
    //
    //

    protected function extendMenusModel()
    {
        Menus_model::extend(function ($model) {
            $model->bindEvent('model.beforeCreate', function () {
                $this->checkMenuLimitOnCreate();
            });
        });
    }

    protected function extendMenusToolbar()
    {
        Event::listen('admin.toolbar.extendButtons', function (Toolbar $toolbar) {
            if ($toolbar->getController() instanceof Menus
                && $toolbar->getController()->getAction() === 'index'
            ) {
                if (!AdminAuth::user()->hasPermission('IgniterLabs.MultiVendor.Cuisines'))
                    return;

                $toolbar->addButton(lang('igniterlabs.multivendor::default.button_cuisines'), [
                    'class' => 'btn btn-default',
                    'href' => admin_url('igniterlabs/multivendor/cuisines'),
                ]);
            }
        });
    }

    protected function checkMenuLimitOnCreate()
    {
        if (!Settings::enableMenusLimit())
            return;

        if (!Vendor::instance()->isUser())
            return;

        $menuItemCount = Menus_model::query()
            ->whereHasLocation(AdminLocation::getId())
            ->count();

        if ($menuItemCount >= Settings::getMenusLimit())
            throw new ApplicationException(sprintf(lang('igniterlabs.multivendor::default.alert_menu_limit'), Settings::getMenusLimit()));
    }

    protected function implementRevisionable()
    {
        if (app()->runningInConsole())
            return;

        Menus_model::extend(function ($model) {
            $model->implement[] = Revisionable::class;
        });
    }

    //
    //
    //

    protected function extendLocationsListColumns()
    {
        Event::listen('admin.list.extendColumns', function (Lists $widget) {
            if (!Vendor::instance()->isUser())
                return;

            if (!$widget->getController() instanceof Locations)
                return;

            $widget->removeColumn('default');
        });
    }

    protected function extendLocationsFormField()
    {
        Locations::extendFormFields(function (Form $form, $model, $context) {
            if (!$model instanceof Locations_model)
                return;

            if (!isset($form->tabs['fields']['location_name']))
                return;

            $form->addTabFields([
                'cuisines' => [
                    'label' => 'lang:igniterlabs.multivendor::default.locations.label_cuisines',
                    'type' => 'relation',
                    'span' => 'left',
                    'comment' => 'lang:igniterlabs.multivendor::default.locations.help_cuisines',
                ],
            ]);
        });
    }

    protected function extendLocationsModel()
    {
        Locations_model::extend(function ($model) {
            $model->relation['hasOne']['vendor'] = [
                \IgniterLabs\MultiVendor\Models\Vendor::class,
            ];
            $model->relation['morphedByMany']['cuisines'] = [
                Cuisine::class, 'name' => 'locationable',
            ];

            $model->bindEvent('model.beforeSave', function () use ($model) {
                if (!Vendor::instance()->isOwner())
                    return;

                if (is_null($model->vendor_id))
                    $model->vendor_id = AdminAuth::staff()->vendor_id;
            });
        });
    }

    protected function extendLocationableModels()
    {
        Model::extend(function ($model) {
            if (!in_array(\Admin\Traits\Locationable::class, class_uses($model)))
                return;

            if ($model instanceof Staffs_model)
                return;

            if (!Vendor::instance()->isUser())
                return;

            $model->bindEvent('model.afterSave', function () use ($model) {
                if ($model->locationableRelationExists())
                    return;

                $locationId = AdminLocation::check()
                    ? AdminLocation::getId()
                    : Vendor::instance()->current()->location_id;

                if (!$model->locationableIsSingleRelationType())
                    $locationId = [$locationId];

                $locationable = $model->{$model->locationableRelationName()}();

                $locationable->attach($locationId);
            });
        });
    }

    protected function disableLocationableAbsenceConstraint()
    {
        AdminController::extend(function ($controller) {
            if (!in_array(LocationAwareController::class, $controller->implement))
                return;

            if (!Vendor::instance()->isUser())
                return;

            $controller->addDynamicProperty('locationConfig', [
                'addAbsenceConstraint' => Settings::enableSharedLocationables(),
            ]);
        });
    }

    //
    //
    //

    protected function extendStaffsModel()
    {
        Staffs_model::extend(function ($model) {
            $model->relation['hasOne']['vendor'] = [
                \IgniterLabs\MultiVendor\Models\Vendor::class,
            ];

            $model->bindEvent('model.beforeSave', function () use ($model) {
                if (!Vendor::instance()->isOwner())
                    return;

                if (is_null($model->vendor_id))
                    $model->vendor_id = AdminAuth::staff()->vendor_id;
            });
        });
    }

    //
    //
    //

    protected function addPaymentEditorFormField()
    {
        if (!Settings::enablePaymentOverride())
            return;

        Locations::extendFormFields(function (Form $form, $model, $context) {
            if (!$model instanceof Locations_model)
                return;

            if (!isset($form->tabs['fields']['location_name']))
                return;

            $form->addTabFields([
                'options[payments]' => [
                    'label' => 'lang:admin::lang.locations.label_payments',
                    'tab' => 'lang:admin::lang.locations.label_payments',
                    'type' => 'paymenteditor',
                    'options' => [\Admin\Models\Payments_model::class, 'listDropdownOptions'],
                    'commentAbove' => 'lang:admin::lang.locations.help_payments',
                    'placeholder' => 'lang:admin::lang.locations.help_no_payments',
                ],
            ]);
        });
    }

    protected function overridePaymentSettings()
    {
        Payments_model::extend(function ($model) {
            $model->bindEvent('model.afterFetch', function () use ($model) {
                if (!Settings::enablePaymentOverride())
                    return;

                $locationId = App::runningInAdmin()
                    ? AdminLocation::getId()
                    : Location::getId();

                if (!strlen($locationId) || !$location = Locations_model::find($locationId))
                    return;

                if (!$model->applyGatewayClass())
                    return;

                $defaultValues = array_map(function ($field) {
                    return array_get($field, 'default');
                }, $model->getConfigFields());

                $paymentSettings = $location->getOption('payment_settings') ?? [];
                $overrideAttributes = array_get($paymentSettings, $model->code, $defaultValues);

                $model->setRawAttributes(array_merge($model->getAttributes(), $overrideAttributes));
            });
        });
    }

    protected function bindCreateCommissionEvent()
    {
        Event::listen('admin.order.paymentProcessed', function (Orders_model $order) {
            if ($order->payment === 'stripe' && ExtensionManager::instance()->hasExtension('igniterlabs.stripeconnect'))
                return;

            if (!$commissionRules = Settings::listOrderCommissionRules($order))
                return;

            Commission::calculate($order, $commissionRules);
        });

        Event::listen('igniterlabs.stripeconnect.extendCommissionCalculator', function ($calculator, $order) {
            if (!$commissionRules = Settings::listOrderCommissionRules($order))
                return;

            $calculator->withRules($commissionRules);
        });

        Event::listen('igniterlabs.stripeconnect.commissionMatched', function ($orderTotal, $rule, $order) {
            Commission::createCommission($order, $rule, $orderTotal);
        });
    }

    protected function extendCustomersListAndFormQueries()
    {
        Event::listen('admin.toolbar.extendButtons', function (Toolbar $toolbar) {
            if (!Vendor::instance()->isUser())
                return;

            if ($toolbar->getController() instanceof Customers
                && $toolbar->getController()->getAction() === 'index'
            ) {
                $toolbar->removeButton('create');
                $toolbar->removeButton('delete');
            }
        });

        Event::listen('admin.list.extendQuery', function ($widget, $query) {
            if (!Vendor::instance()->isUser())
                return;

            if (!$widget->getController() instanceof Customers)
                return;

            $query->whereHas('orders', function ($query) {
                $query->where('location_id', AdminLocation::getId());
            })->orWhereHas('reservations', function ($query) {
                $query->where('location_id', AdminLocation::getId());
            });
        });

        Event::listen('admin.list.extendColumns', function (Lists $widget) {
            if (!Vendor::instance()->isUser())
                return;

            if (!$widget->getController() instanceof Customers)
                return;

            $column = $widget->getColumn('edit');
            $column->iconCssClass = 'fa fa-eye';
            $column->attributes['href'] = 'customers/preview/{customer_id}';
        });

        Customers::extend(function ($controller) {
            if (!Vendor::instance()->isUser())
                return;

            $controller->hiddenActions = array_merge($controller->hiddenActions, [
                'create', 'edit',
            ]);

            $controller->bindEvent('controller.form.extendQuery', function ($query) {
                $query->whereHas('orders', function ($query) {
                    $query->where('location_id', AdminLocation::getId());
                })->orWhereHas('reservations', function ($query) {
                    $query->where('location_id', AdminLocation::getId());
                });
            });
        });

        Customers_model::deleting(function ($model) {
            if (!Vendor::instance()->isUser())
                return;

            throw new ApplicationException(lang('igniterlabs.multivendor::default.alert_cannot_be_deleted'));
        });
    }
}
