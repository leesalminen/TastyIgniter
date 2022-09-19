<?php

namespace IgniterLabs\MultiVendor\Controllers;

use Admin\Facades\AdminMenu;

/**
 * Commissions Admin Controller
 */
class Commissions extends \Admin\Classes\AdminController
{
    public $implement = [
        \Admin\Actions\FormController::class,
        \Admin\Actions\ListController::class,
    ];

    public $listConfig = [
        'list' => [
            'model' => \IgniterLabs\MultiVendor\Models\Commission::class,
            'title' => 'lang:igniterlabs.multivendor::default.commissions.text_title',
            'emptyMessage' => 'lang:admin::lang.list.text_empty',
            'defaultSort' => ['created_at', 'DESC'],
            'configFile' => 'commission',
        ],
    ];

    public $formConfig = [
        'name' => 'lang:igniterlabs.multivendor::default.commissions.text_title',
        'model' => \IgniterLabs\MultiVendor\Models\Commission::class,
        'edit' => [
            'title' => 'lang:admin::lang.form.edit_title',
            'redirect' => 'igniterlabs/multivendor/cuisines/edit/{cuisine_id}',
            'redirectClose' => 'igniterlabs/multivendor/cuisines',
        ],
        'preview' => [
            'title' => 'lang:admin::lang.form.preview_title',
            'redirect' => 'igniterlabs/multivendor/commissions',
        ],
        'delete' => [
            'redirect' => 'igniterlabs/multivendor/cuisines',
        ],
        'configFile' => 'commission',
    ];

    protected $requiredPermissions = 'IgniterLabs.MultiVendor.Commissions';

    public function __construct()
    {
        parent::__construct();

        AdminMenu::setContext('vendors', 'restaurant');
    }
}
