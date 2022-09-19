<?php

namespace IgniterLabs\MultiVendor\Controllers;

use Admin\Facades\AdminMenu;
use Admin\Widgets\Toolbar;
use Illuminate\Support\Facades\Mail;

/**
 * Vendors Admin Controller
 */
class Vendors extends \Admin\Classes\AdminController
{
    public $implement = [
        \Admin\Actions\FormController::class,
        \Admin\Actions\ListController::class,
    ];

    public $listConfig = [
        'list' => [
            'model' => \IgniterLabs\MultiVendor\Models\Vendor::class,
            'title' => 'lang:igniterlabs.multivendor::default.vendors.text_title',
            'emptyMessage' => 'lang:admin::lang.list.text_empty',
            'defaultSort' => ['id', 'DESC'],
            'configFile' => 'vendor',
        ],
    ];

    public $formConfig = [
        'name' => 'lang:igniterlabs.multivendor::default.vendors.text_title',
        'model' => \IgniterLabs\MultiVendor\Models\Vendor::class,
        'create' => [
            'title' => 'lang:admin::lang.form.create_title',
            'redirect' => 'igniterlabs/multivendor/vendors/edit/{id}',
            'redirectClose' => 'igniterlabs/multivendor/vendors',
        ],
        'edit' => [
            'title' => 'lang:admin::lang.form.edit_title',
            'redirect' => 'igniterlabs/multivendor/vendors/edit/{id}',
            'redirectClose' => 'igniterlabs/multivendor/vendors',
        ],
        'preview' => [
            'title' => 'lang:admin::lang.form.preview_title',
            'redirect' => 'igniterlabs/multivendor/vendors',
        ],
        'delete' => [
            'redirect' => 'igniterlabs/multivendor/vendors',
        ],
        'configFile' => 'vendor',
    ];

    protected $requiredPermissions = 'IgniterLabs.MultiVendor.Vendors';

    public function __construct()
    {
        parent::__construct();

        AdminMenu::setContext('vendors', 'restaurant');
    }

    public function edit_onApprove($context, $recordId = null)
    {
        $model = $this->formFindModelObject($recordId);

        if ($model->requiresApproval()) {
            $model->approve();
            $this->sendApprovalNotification($model);
        }

        flash()->success(lang('igniterlabs.multivendor::default.alert_location_approved'));

        return $this->redirectBack();
    }

    public function edit_onReject($context, $recordId = null)
    {
        $model = $this->formFindModelObject($recordId);

        if ($model->requiresApproval()) {
            $model->reject();
            $this->sendRejectionNotification($model);
        }

        flash()->success(lang('igniterlabs.multivendor::default.alert_location_rejected'));

        return $this->redirectBack();
    }

    public function formExtendModel($model)
    {
        if (!$model->requiresApproval() && isset($this->widgets['toolbar'])) {
            $toolbarWidget = $this->widgets['toolbar'];
            if ($toolbarWidget instanceof Toolbar) {
                $toolbarWidget->bindEvent('toolbar.extendButtons', function () use ($toolbarWidget) {
                    $toolbarWidget->removeButton('approve');
                    $toolbarWidget->removeButton('reject');
                });
            }
        }
    }

    public function formAfterCreate($model)
    {
        if ($model->is_enabled)
            $model->approve();
    }

    public function formValidate($model, $form)
    {
        if ($form->getContext() !== 'create')
            return;

        $rules = [
            ['name', 'igniterlabs.multivendor::default.vendors.label_name', 'required|between:2,128|unique:locations,location_name'],
            ['restaurant.name', 'admin::lang.label_name', 'required|between:2,32'],
            ['restaurant.email', 'admin::lang.label_email', 'required|email:filter|max:96'],
            ['restaurant.telephone', 'admin::lang.locations.label_telephone', 'sometimes'],
            ['restaurant.street', 'admin::lang.locations.label_address_1', 'required|between:2,128'],
            ['restaurant.city', 'admin::lang.locations.label_city', 'max:128'],
            ['restaurant.state', 'admin::lang.locations.label_state', 'max:128'],
            ['restaurant.postcode', 'admin::lang.locations.label_postcode', 'max:10'],
            ['restaurant.country_id', 'admin::lang.locations.label_country', 'required|integer'],
            ['admin.name', 'admin::lang.label_name', 'required|between:2,128'],
            ['admin.email', 'admin::lang.label_email', 'required|max:96|email:filter|unique:staffs,staff_email'],
            ['admin.username', 'admin::lang.staff.label_username', 'required|alpha_dash|between:2,32|unique:users,username'],
            ['admin.password', 'admin::lang.staff.label_password', 'required|between:6,32|same:admin.password_confirm'],
            ['admin.password_confirm', 'admin::lang.staff.label_confirm_password'],
        ];

        return $this->validatePasses($form->getSaveData(), $rules);
    }

    public function sendApprovalNotification($vendor)
    {
        $data = [
            'vendor' => $vendor,
        ];

        Mail::queue('igniterlabs.multivendor::_mail.approval', $data, function ($message) use ($vendor) {
            $message->to($vendor->location->location_email, $vendor->location->location_name);
        });
    }

    public function sendRejectionNotification($vendor)
    {
        $data = [
            'vendor' => $vendor,
        ];

        Mail::queue('igniterlabs.multivendor::_mail.rejection', $data, function ($message) use ($vendor) {
            $message->to($vendor->location->location_email, $vendor->location->location_name);
        });
    }
}
