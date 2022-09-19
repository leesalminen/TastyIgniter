<?php

return [
    'list' => [
        'filter' => [
            'search' => [
                'prompt' => 'igniterlabs.multivendor::default.vendors.text_filter_search',
                'mode' => 'all',
            ],
            'scopes' => [
                'location' => [
                    'label' => 'lang:admin::lang.text_filter_location',
                    'type' => 'selectlist',
                    'scope' => 'whereHasLocation',
                    'modelClass' => \Admin\Models\Locations_model::class,
                    'nameFrom' => 'location_name',
                    'locationAware' => true,
                ],
                'status' => [
                    'label' => 'lang:admin::lang.text_filter_status',
                    'type' => 'switch',
                    'conditions' => 'is_enabled = :filtered',
                ],
            ],
        ],
        'toolbar' => [
            'buttons' => [
                'create' => [
                    'label' => 'lang:admin::lang.button_new',
                    'class' => 'btn btn-primary',
                    'href' => 'igniterlabs/multivendor/vendors/create',
                ],
                'commissions' => [
                    'label' => 'lang:igniterlabs.multivendor::default.commissions.text_title',
                    'class' => 'btn btn-default',
                    'href' => 'igniterlabs/multivendor/commissions',
                ],
                'commission_rules' => [
                    'label' => 'lang:igniterlabs.multivendor::default.commission_rules.button_rules',
                    'class' => 'btn btn-default',
                    'href' => 'igniterlabs/multivendor/commissionrules',
                ],
//                'revision_history' => [
//                    'label' => 'lang:igniterlabs.multivendor::default.side_menu_revisions',
//                    'class' => 'btn btn-default',
//                    'href' => 'igniterlabs/multivendor/revision_history',
//                ],
            ],
        ],
        'bulkActions' => [
            'status' => [
                'label' => 'lang:admin::lang.list.actions.label_status',
                'type' => 'dropdown',
                'class' => 'btn btn-light',
                'statusColumn' => 'is_enabled',
                'menuItems' => [
                    'enable' => [
                        'label' => 'lang:admin::lang.list.actions.label_enable',
                        'type' => 'button',
                        'class' => 'dropdown-item',
                    ],
                    'disable' => [
                        'label' => 'lang:admin::lang.list.actions.label_disable',
                        'type' => 'button',
                        'class' => 'dropdown-item text-danger',
                    ],
                ],
            ],
            'delete' => [
                'label' => 'lang:admin::lang.button_delete',
                'class' => 'btn btn-light text-danger',
                'data-request-confirm' => 'lang:admin::lang.alert_warning_confirm',
            ],
        ],
        'columns' => [
            'edit' => [
                'type' => 'button',
                'iconCssClass' => 'fa fa-pencil',
                'attributes' => [
                    'class' => 'btn btn-edit',
                    'href' => 'igniterlabs/multivendor/vendors/edit/{id}',
                ],
            ],
            'name' => [
                'label' => 'igniterlabs.multivendor::default.vendors.column_vendor',
                'type' => 'text',
            ],
            'location_name' => [
                'label' => 'igniterlabs.multivendor::default.vendors.column_location',
                'relation' => 'location',
                'select' => 'location_name',
            ],
            'staff_name' => [
                'label' => 'igniterlabs.multivendor::default.vendors.column_staff',
                'relation' => 'owner',
                'select' => 'staff_name',
            ],
            'is_enabled' => [
                'label' => 'igniterlabs.multivendor::default.vendors.column_status',
                'type' => 'switch',
            ],
            'approved_at' => [
                'label' => 'igniterlabs.multivendor::default.vendors.column_approved_at',
            ],
            'updated_at' => [
                'label' => 'igniterlabs.multivendor::default.vendors.column_updated_at',
            ],
            'created_at' => [
                'label' => 'igniterlabs.multivendor::default.vendors.column_created_at',
            ],
        ],
    ],
    'form' => [
        'toolbar' => [
            'buttons' => [
                'back' => [
                    'label' => 'lang:admin::lang.button_icon_back',
                    'class' => 'btn btn-outline-secondary',
                    'href' => 'igniterlabs/multivendor/vendors',
                ],
                'save' => [
                    'label' => 'lang:admin::lang.button_save',
                    'context' => ['create', 'edit'],
                    'partial' => 'form/toolbar_save_button',
                    'class' => 'btn btn-primary',
                    'data-request' => 'onSave',
                    'data-progress-indicator' => 'admin::lang.text_saving',
                ],
                'approve' => [
                    'label' => 'lang:igniterlabs.multivendor::default.button_approve',
                    'class' => 'btn btn-success',
                    'data-request' => 'onApprove',
                    'data-progress-indicator' => 'lang:igniterlabs.multivendor::default.text_approving',
                    'context' => ['edit'],
                ],
                'reject' => [
                    'label' => 'lang:igniterlabs.multivendor::default.button_reject',
                    'class' => 'btn btn-danger',
                    'data-request' => 'onReject',
                    'data-progress-indicator' => 'lang:igniterlabs.multivendor::default.text_rejecting',
                    'context' => ['edit'],
                ],
                'delete' => [
                    'label' => 'lang:admin::lang.button_icon_delete', 'class' => 'btn btn-danger',
                    'data-request' => 'onDelete', 'data-request-data' => "_method:'DELETE'",
                    'data-progress-indicator' => 'lang:admin::lang.text_deleting',
                    'data-request-confirm' => 'lang:admin::lang.alert_warning_confirm', 'context' => ['edit'],
                ],
            ],
        ],
        'fields' => [
            'name' => [
                'label' => 'igniterlabs.multivendor::default.vendors.label_name',
                'type' => 'text',
            ],
            'restaurant_info' => [
                'label' => 'lang:igniterlabs.multivendor::default.vendors.label_restaurant_info',
                'context' => ['create'],
                'type' => 'section',
            ],
            'restaurant[name]' => [
                'label' => 'lang:admin::lang.label_name',
                'context' => ['create'],
                'type' => 'text',
                'span' => 'left',
            ],
            'restaurant[email]' => [
                'label' => 'lang:admin::lang.label_email',
                'context' => ['create'],
                'type' => 'text',
                'span' => 'right',
            ],
            'restaurant[telephone]' => [
                'label' => 'lang:admin::lang.locations.label_telephone',
                'context' => ['create'],
                'type' => 'text',
                'span' => 'left',
            ],
            'restaurant[street]' => [
                'label' => 'lang:admin::lang.locations.label_address_1',
                'context' => ['create'],
                'type' => 'text',
                'span' => 'right',
            ],
            'restaurant[city]' => [
                'label' => 'lang:admin::lang.locations.label_city',
                'context' => ['create'],
                'type' => 'text',
                'span' => 'left',
            ],
            'restaurant[state]' => [
                'label' => 'lang:admin::lang.locations.label_state',
                'context' => ['create'],
                'type' => 'text',
                'span' => 'right',
            ],
            'restaurant[postcode]' => [
                'label' => 'lang:admin::lang.locations.label_postcode',
                'context' => ['create'],
                'type' => 'text',
                'span' => 'left',
            ],
            'restaurant[country_id]' => [
                'label' => 'lang:admin::lang.locations.label_country',
                'context' => ['create'],
                'type' => 'select',
                'span' => 'right',
                'options' => [\System\Models\Countries_model::class, 'getDropdownOptions'],
                'default' => setting('country_id'),
            ],
            'admin_info' => [
                'label' => 'lang:igniterlabs.multivendor::default.vendors.label_admin_info',
                'context' => ['create'],
                'type' => 'section',
            ],
            'admin[name]' => [
                'label' => 'lang:admin::lang.label_name',
                'context' => ['create'],
                'type' => 'text',
                'span' => 'left',
            ],
            'admin[email]' => [
                'label' => 'lang:admin::lang.label_email',
                'context' => ['create'],
                'type' => 'text',
                'span' => 'right',
            ],
            'admin[username]' => [
                'label' => 'lang:admin::lang.staff.label_username',
                'context' => ['create'],
                'type' => 'text',
                'span' => 'left',
            ],
            'admin[password]' => [
                'label' => 'lang:admin::lang.staff.label_password',
                'context' => ['create'],
                'type' => 'password',
                'span' => 'right',
                'cssClass' => 'flex-width',
            ],
            'admin[password_confirm]' => [
                'label' => 'lang:admin::lang.staff.label_confirm_password',
                'context' => ['create'],
                'type' => 'password',
                'span' => 'right',
                'cssClass' => 'flex-width',
            ],

            'location_id' => [
                'label' => 'igniterlabs.multivendor::default.vendors.label_default_location',
                'context' => ['edit'],
                'type' => 'relation',
                'span' => 'left',
                'relationFrom' => 'location',
                'nameFrom' => 'location_name',
            ],
            'staff_id' => [
                'label' => 'igniterlabs.multivendor::default.vendors.label_owner',
                'context' => ['edit'],
                'type' => 'relation',
                'span' => 'right',
                'relationFrom' => 'owner',
                'nameFrom' => 'staff_name',
            ],
            'locations' => [
                'label' => 'igniterlabs.multivendor::default.vendors.label_locations',
                'context' => ['edit'],
                'type' => 'relation',
                'span' => 'left',
                'nameFrom' => 'location_name',
            ],
            'staffs' => [
                'label' => 'igniterlabs.multivendor::default.vendors.label_staff',
                'context' => ['edit'],
                'type' => 'relation',
                'span' => 'right',
                'nameFrom' => 'staff_name',
            ],
            'commission_rules' => [
                'label' => 'lang:igniterlabs.multivendor::default.vendors.label_commission_rule',
                'context' => ['edit'],
                'type' => 'relation',
                'comment' => 'lang:igniterlabs.multivendor::default.vendors.help_commission_rule',
            ],
            'approved_at' => [
                'label' => 'igniterlabs.multivendor::default.vendors.column_approved_at',
                'context' => ['create', 'edit'],
                'type' => 'datepicker',
                'mode' => 'datetime',
                'span' => 'left',
                'disabled' => true,
            ],
            'is_enabled' => [
                'label' => 'igniterlabs.multivendor::default.vendors.column_status',
                'context' => ['create', 'edit'],
                'type' => 'switch',
                'span' => 'right',
            ],
        ],
    ],
];
