<?php

return [
    'list' => [
        'filter' => [
            'search' => [
                'prompt' => 'igniterlabs.multivendor::default.commissions.text_filter_search',
                'mode' => 'all',
            ],
            'scopes' => [
                'location' => [
                    'label' => 'lang:admin::lang.text_filter_location',
                    'type' => 'selectlist',
                    'conditions' => 'location_id = :filtered',
                    'modelClass' => \Admin\Models\Locations_model::class,
                    'nameFrom' => 'location_name',
                    'locationAware' => true,
                ],
                'status' => [
                    'label' => 'lang:admin::lang.text_filter_status',
                    'type' => 'selectlist',
                    'conditions' => 'status_code IN(:filtered)',
                    'modelClass' => \IgniterLabs\MultiVendor\Models\Commission::class,
                    'options' => 'getStatusCodeOptions',
                ],
                'date' => [
                    'label' => 'lang:admin::lang.text_filter_date',
                    'type' => 'daterange',
                    'conditions' => 'created_at >= CAST(:filtered_start AS DATETIME) &&  created_at <= CAST(:filtered_end AS DATETIME)',
                ],
            ],
        ],
        'toolbar' => [
            'buttons' => [
                'back' => [
                    'label' => 'lang:admin::lang.button_icon_back',
                    'class' => 'btn btn-outline-secondary',
                    'href' => 'igniterlabs/multivendor/vendors',
                ],
                'commission_rules' => [
                    'label' => 'lang:igniterlabs.multivendor::default.commission_rules.button_rules',
                    'class' => 'btn btn-default',
                    'href' => 'igniterlabs/multivendor/commissionrules',
                ],
            ],
        ],
        'columns' => [
            'edit' => [
                'type' => 'button',
                'iconCssClass' => 'fa fa-pencil',
                'attributes' => [
                    'class' => 'btn btn-edit',
                    'href' => 'igniterlabs/multivendor/commissions/edit/{id}',
                ],
            ],
            'location_name' => [
                'label' => 'igniterlabs.multivendor::default.vendors.label_location',
                'relation' => 'location',
                'select' => 'location_name',
                'searchable' => true,
                'locationAware' => true,
            ],
            'order_id' => [
                'label' => 'igniterlabs.multivendor::default.commissions.column_order_id',
                'type' => 'number',
                'searchable' => true,
            ],
            'fee_type' => [
                'label' => 'igniterlabs.multivendor::default.commissions.column_fee_type',
                'type' => 'text',
                'invisible' => true,
            ],
            'fee' => [
                'label' => 'igniterlabs.multivendor::default.commissions.column_fee',
                'type' => 'number',
                'invisible' => true,
            ],
            'amount' => [
                'label' => 'igniterlabs.multivendor::default.commissions.column_amount',
                'type' => 'currency',
            ],
            'order_total' => [
                'label' => 'igniterlabs.multivendor::default.commissions.column_order_total',
                'type' => 'currency',
            ],
            'status_code' => [
                'label' => 'igniterlabs.multivendor::default.commissions.column_status',
                'type' => 'text',
            ],
            'paid_at' => [
                'label' => 'igniterlabs.multivendor::default.commissions.column_paid_at',
                'type' => 'timetense',
            ],
            'refunded_at' => [
                'label' => 'igniterlabs.multivendor::default.commissions.column_refunded_at',
                'type' => 'timetense',
                'invisible' => true,
            ],
            'updated_at' => [
                'label' => 'lang:admin::lang.column_date_updated',
                'type' => 'timetense',
                'invisible' => true,
            ],
            'created_at' => [
                'label' => 'lang:admin::lang.column_date_added',
                'type' => 'timetense',
            ],
        ],
    ],
    'form' => [
        'toolbar' => [
            'buttons' => [
                'back' => [
                    'label' => 'lang:admin::lang.button_icon_back',
                    'class' => 'btn btn-outline-secondary',
                    'href' => 'igniterlabs/multivendor/commissions',
                ],
                'save' => [
                    'label' => 'lang:admin::lang.button_save',
                    'context' => ['create', 'edit'],
                    'partial' => 'form/toolbar_save_button',
                    'class' => 'btn btn-primary',
                    'data-request' => 'onSave',
                    'data-progress-indicator' => 'admin::lang.text_saving',
                ],
                'delete' => [
                    'label' => 'lang:admin::lang.button_icon_delete', 'class' => 'btn btn-danger',
                    'data-request' => 'onDelete', 'data-request-data' => "_method:'DELETE'",
                    'data-progress-indicator' => 'lang:admin::lang.text_deleting',
                    'data-request-confirm' => 'lang:admin::lang.alert_warning_confirm',
                    'context' => ['edit'],
                ],
            ],
        ],
        'fields' => [
            'status_code' => [
                'label' => 'igniterlabs.multivendor::default.commissions.column_status',
                'type' => 'radiotoggle',
            ],
            'location' => [
                'label' => 'igniterlabs.multivendor::default.vendors.label_name',
                'type' => 'relation',
                'nameFrom' => 'location_name',
                'span' => 'left',
                'locationAware' => true,
                'disabled' => true,
            ],
            'order_id' => [
                'label' => 'igniterlabs.multivendor::default.commissions.column_order_id',
                'type' => 'number',
                'span' => 'right',
                'disabled' => true,
            ],
            'fee' => [
                'label' => 'igniterlabs.multivendor::default.commissions.column_fee',
                'type' => 'currency',
                'span' => 'left',
                'disabled' => true,
            ],
            'order_total' => [
                'label' => 'igniterlabs.multivendor::default.commissions.column_order_total',
                'type' => 'currency',
                'span' => 'right',
                'disabled' => true,
            ],
            'paid_at' => [
                'label' => 'igniterlabs.multivendor::default.commissions.column_paid_at',
                'type' => 'datepicker',
                'span' => 'left',
                'disabled' => true,
            ],
            'refunded_at' => [
                'label' => 'igniterlabs.multivendor::default.commissions.column_refunded_at',
                'type' => 'datepicker',
                'span' => 'right',
                'disabled' => true,
            ],
            'updated_at' => [
                'label' => 'lang:admin::lang.column_date_updated',
                'type' => 'datepicker',
                'span' => 'left',
                'disabled' => true,
            ],
            'created_at' => [
                'label' => 'lang:admin::lang.column_date_added',
                'type' => 'datepicker',
                'span' => 'right',
                'disabled' => true,
            ],
        ],
    ],
];
