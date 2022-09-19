<?php

namespace IgniterLabs\MultiVendor\Controllers;

use Admin\Facades\AdminMenu;

/**
 * Cuisines Admin Controller
 */
class Cuisines extends \Admin\Classes\AdminController
{
    public $implement = [
        \Admin\Actions\FormController::class,
        \Admin\Actions\ListController::class,
    ];

    public $listConfig = [
        'list' => [
            'model' => \IgniterLabs\MultiVendor\Models\Cuisine::class,
            'title' => 'lang:igniterlabs.multivendor::default.cuisine.text_title',
            'emptyMessage' => 'lang:admin::lang.list.text_empty',
            'defaultSort' => ['cuisine_id', 'DESC'],
            'configFile' => 'cuisine',
        ],
    ];

    public $formConfig = [
        'name' => 'lang:igniterlabs.multivendor::default.cuisine.text_title',
        'model' => \IgniterLabs\MultiVendor\Models\Cuisine::class,
        'create' => [
            'title' => 'lang:admin::lang.form.create_title',
            'redirect' => 'igniterlabs/multivendor/cuisines/edit/{cuisine_id}',
            'redirectClose' => 'igniterlabs/multivendor/cuisines',
        ],
        'edit' => [
            'title' => 'lang:admin::lang.form.edit_title',
            'redirect' => 'igniterlabs/multivendor/cuisines/edit/{cuisine_id}',
            'redirectClose' => 'igniterlabs/multivendor/cuisines',
        ],
        'preview' => [
            'title' => 'lang:admin::lang.form.preview_title',
            'redirect' => 'igniterlabs/multivendor/cuisines',
        ],
        'delete' => [
            'redirect' => 'igniterlabs/multivendor/cuisines',
        ],
        'configFile' => 'cuisine',
    ];

    protected $requiredPermissions = 'IgniterLabs.MultiVendor.Cuisines';

    public function __construct()
    {
        parent::__construct();

        AdminMenu::setContext('menus', 'restaurant');
    }
}
