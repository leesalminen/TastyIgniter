<?php

namespace IgniterLabs\MultiVendor\Controllers;

use Admin\Facades\AdminMenu;

/**
 * CommissionRules Admin Controller
 */
class CommissionRules extends \Admin\Classes\AdminController
{
    public $implement = [
        \Admin\Actions\FormController::class,
        \Admin\Actions\ListController::class,
    ];

    public $listConfig = [
        'list' => [
            'model' => \IgniterLabs\MultiVendor\Models\CommissionRule::class,
            'title' => 'lang:igniterlabs.multivendor::default.commission_rules.text_title',
            'emptyMessage' => 'lang:admin::lang.list.text_empty',
            'defaultSort' => ['created_at', 'DESC'],
            'configFile' => 'commissionrule',
        ],
    ];

    public $formConfig = [
        'name' => 'lang:igniterlabs.multivendor::default.commission_rules.text_title',
        'model' => \IgniterLabs\MultiVendor\Models\CommissionRule::class,
        'create' => [
            'title' => 'lang:admin::lang.form.create_title',
            'redirect' => 'igniterlabs/multivendor/commissionrules/edit/{id}',
            'redirectClose' => 'igniterlabs/multivendor/commissionrules',
        ],
        'edit' => [
            'title' => 'lang:admin::lang.form.edit_title',
            'redirect' => 'igniterlabs/multivendor/commissionrules/edit/{id}',
            'redirectClose' => 'igniterlabs/multivendor/commissionrules',
        ],
        'preview' => [
            'title' => 'lang:admin::lang.form.preview_title',
            'redirect' => 'igniterlabs/multivendor/commissionrules',
        ],
        'delete' => [
            'redirect' => 'igniterlabs/multivendor/commissionrules',
        ],
        'configFile' => 'commissionrule',
    ];

    protected $requiredPermissions = 'IgniterLabs.MultiVendor.Commissions';

    public function __construct()
    {
        parent::__construct();

        AdminMenu::setContext('vendors', 'restaurant');
    }
}
