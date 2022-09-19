<?php

/**
 * Model configuration options for settings model.
 */

return [
    'form' => [
        'toolbar' => [
            'buttons' => [
                'back' => [
                    'label' => 'lang:admin::lang.button_icon_back',
                    'class' => 'btn btn-outline-secondary',
                    'href' => 'settings',
                ],
                'save' => [
                    'label' => 'lang:admin::lang.button_save',
                    'class' => 'btn btn-primary',
                    'data-request' => 'onSave',
                    'data-progress-indicator' => 'admin::lang.text_saving',
                ],
                'commission_rules' => [
                    'label' => 'lang:igniterlabs.multivendor::default.commission_rules.button_rules',
                    'class' => 'btn btn-default',
                    'href' => 'igniterlabs/multivendor/commissionrules',
                ],
            ],
        ],
        'tabs' => [
            'defaultTab' => 'lang:igniterlabs.multivendor::default.text_tab_general',
            'fields' => [
                'require_vendor_approval' => [
                    'label' => 'lang:igniterlabs.multivendor::default.label_require_vendor_approval',
                    'type' => 'switch',
                    'default' => true,
                    'help' => 'lang:igniterlabs.multivendor::default.help_require_vendor_approval',
                ],
                'distinct_payment_settings' => [
                    'label' => 'lang:igniterlabs.multivendor::default.label_distinct_payment',
                    'type' => 'switch',
                    'default' => false,
                    'comment' => 'lang:igniterlabs.multivendor::default.help_distinct_payment',
                ],
                'hide_customer_details' => [
                    'label' => 'lang:igniterlabs.multivendor::default.label_hide_customer_details',
                    'type' => 'switch',
                    'span' => 'left',
                    'on' => 'admin::lang.text_yes', 'off' => 'admin::lang.text_no',
                    'comment' => 'lang:igniterlabs.multivendor::default.help_hide_customer_details',
                ],
                'hide_payment_details' => [
                    'label' => 'lang:igniterlabs.multivendor::default.label_hide_payment_details',
                    'type' => 'switch',
                    'span' => 'right',
                    'on' => 'admin::lang.text_yes', 'off' => 'admin::lang.text_no',
                    'comment' => 'lang:igniterlabs.multivendor::default.help_hide_payment_details',
                ],
                'enable_menus_limit' => [
                    'label' => 'lang:igniterlabs.multivendor::default.label_enable_menus_limit',
                    'type' => 'switch',
                    'span' => 'left',
                    'comment' => 'lang:igniterlabs.multivendor::default.help_enable_menus_limit',
                ],
                'menu_item_limit' => [
                    'label' => 'lang:igniterlabs.multivendor::default.label_menu_item_limit',
                    'type' => 'number',
                    'span' => 'right',
                    'default' => 20,
                    'comment' => 'lang:igniterlabs.multivendor::default.help_menu_item_limit',
                    'trigger' => [
                        'action' => 'enable',
                        'field' => 'enable_menus_limit',
                        'condition' => 'checked',
                    ],
                ],
                'vendor_owner_role' => [
                    'label' => 'lang:igniterlabs.multivendor::default.label_vendor_owner_role',
                    'type' => 'select',
                    'span' => 'left',
                    'options' => [\Admin\Models\Staff_roles_model::class, 'getDropdownOptions'],
                    'comment' => 'lang:igniterlabs.multivendor::default.help_vendor_owner_role',
                ],
                'vendor_admin_roles' => [
                    'label' => 'lang:igniterlabs.multivendor::default.label_vendor_admin_roles',
                    'type' => 'select',
                    'span' => 'right',
                    'multiOption' => true,
                    'options' => [\Admin\Models\Staff_roles_model::class, 'getDropdownOptions'],
                    'comment' => 'lang:igniterlabs.multivendor::default.help_vendor_admin_roles',
                ],

                'payouts_gateway' => [
                    'tab' => 'lang:igniterlabs.multivendor::default.text_tab_commissions',
                    'label' => 'lang:igniterlabs.multivendor::default.label_payouts_gateway',
                    'type' => 'radiolist',
                    'default' => 'disabled',
                    'commentAbove' => 'lang:igniterlabs.multivendor::default.help_payouts_gateway',
                ],
            ],
        ],
        'rules' => [
            ['require_vendor_approval', 'lang:igniterlabs.multivendor::default.label_require_vendor_approval', 'boolean'],
            ['require_menu_approval', 'lang:igniterlabs.multivendor::default.label_require_menu_approval', 'boolean'],
            ['distinct_payment_settings', 'lang:igniterlabs.multivendor::default.label_enable_commissions', 'boolean'],
            ['hide_customer_details', 'lang:igniterlabs.multivendor::default.label_hide_customer_details', 'boolean'],
            ['hide_payment_details', 'lang:igniterlabs.multivendor::default.label_hide_payment_details', 'boolean'],
            ['enable_menus_limit', 'lang:igniterlabs.multivendor::default.label_enable_menus_limit', 'boolean'],
            ['menu_item_limit', 'lang:igniterlabs.multivendor::default.label_menu_item_limit', 'integer|min:1'],
            ['vendor_owner_role', 'lang:igniterlabs.multivendor::default.label_vendor_owner_role', 'required|integer'],
            ['vendor_admin_roles', 'lang:igniterlabs.multivendor::default.label_vendor_admin_roles', 'required|array'],
            ['vendor_admin_roles.*', 'lang:igniterlabs.multivendor::default.label_vendor_admin_roles', 'required|integer'],
            ['payouts_gateway', 'lang:igniterlabs.multivendor::default.label_payouts_gateway', 'required|string'],
        ],
    ],
];
