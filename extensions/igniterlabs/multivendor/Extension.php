<?php namespace IgniterLabs\MultiVendor;

use IgniterLabs\MultiVendor\Classes\Manager;
use IgniterLabs\MultiVendor\Components\CuisineFilter;
use IgniterLabs\MultiVendor\Components\RestaurantSignup;
use IgniterLabs\MultiVendor\FormWidgets\PaymentEditor;
use System\Classes\BaseExtension;

/**
 * MultiVendor Extension Information File
 */
class Extension extends BaseExtension
{
    public function register()
    {
    }

    public function boot()
    {
        Manager::instance()->boot();
    }

    public function registerComponents()
    {
        return [
            CuisineFilter::class => [
                'code' => 'cuisineFilter',
                'name' => 'Cuisine Filter',
                'description' => 'Filter locations list by cuisine',
            ],
            RestaurantSignup::class => [
                'code' => 'restaurantSignup',
                'name' => 'Restaurant Signup',
                'description' => 'Add a vendor signup form to your page',
            ],
        ];
    }

    public function registerFormWidgets()
    {
        return [
            PaymentEditor::class => [
                'label' => 'Payment Editor',
                'code' => 'paymenteditor',
            ],
        ];
    }

    public function registerMailTemplates()
    {
        return [
            'igniterlabs.multivendor::_mail.registration_alert' => 'Vendor registration email to admin',
            'igniterlabs.multivendor::_mail.registration' => 'Registration email to vendor',
            'igniterlabs.multivendor::_mail.approval' => 'Registration approval email to vendor',
            'igniterlabs.multivendor::_mail.menu_added' => 'Menu item added for review to vendor',
        ];
    }

    public function registerNavigation()
    {
        return [
            'restaurant' => [
                'child' => [
                    'vendors' => [
                        'priority' => 1,
                        'class' => 'vendors',
                        'href' => admin_url('igniterlabs/multivendor/vendors'),
                        'title' => lang('igniterlabs.multivendor::default.side_menu_vendors'),
                        'permission' => 'IgniterLabs.MultiVendor.Vendors',
                    ],
                ],
            ],
        ];
    }

    public function registerPermissions()
    {
        return [
            'IgniterLabs.MultiVendor.Manage' => [
                'description' => 'igniterlabs.multivendor::default.permission.manage',
                'group' => 'module',
            ],
            'IgniterLabs.MultiVendor.Vendors' => [
                'description' => 'igniterlabs.multivendor::default.permission.vendors',
                'group' => 'module',
            ],
            'IgniterLabs.MultiVendor.Commissions' => [
                'description' => 'igniterlabs.multivendor::default.permission.commissions',
                'group' => 'module',
            ],
            'IgniterLabs.MultiVendor.Cuisines' => [
                'description' => 'igniterlabs.multivendor::default.permission.cuisines',
                'group' => 'module',
            ],
        ];
    }

    public function registerSettings()
    {
        return [
            'settings' => [
                'priority' => 1,
                'label' => 'igniterlabs.multivendor::default.setting_title',
                'description' => 'igniterlabs.multivendor::default.setting_desc',
                'icon' => 'fa fa-cog',
                'model' => \IgniterLabs\MultiVendor\Models\Settings::class,
                'permissions' => ['IgniterLabs.MultiVendor.Manage'],
            ],
        ];
    }
}
