<?php

return [
    'list' => [
        'toolbar' => [
            'buttons' => [
                'back' => [
                    'label' => 'lang:admin::lang.button_icon_back',
                    'class' => 'btn btn-outline-secondary',
                    'href' => 'igniterlabs/multivendor/commissions',
                ],
                'create' => [
                    'label' => 'lang:admin::lang.button_new',
                    'class' => 'btn btn-primary',
                    'href' => 'igniterlabs/multivendor/commissionrules/create',
                ],
            ],
        ],
        'bulkActions' => [
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
                    'href' => 'igniterlabs/multivendor/commissionrules/edit/{id}',
                ],
            ],
            'name' => [
                'label' => 'igniterlabs.multivendor::default.commission_rules.label_name',
                'type' => 'text',
            ],
            'fee_type' => [
                'label' => 'igniterlabs.multivendor::default.commission_rules.label_fee_type',
                'type' => 'text',
            ],
            'fee' => [
                'label' => 'igniterlabs.multivendor::default.commission_rules.label_fee',
                'type' => 'currency',
            ],
            'priority' => [
                'label' => 'igniterlabs.multivendor::default.commission_rules.label_priority',
                'type' => 'number',
            ],
        ],
    ],
    'form' => [
        'toolbar' => [
            'buttons' => [
                'back' => [
                    'label' => 'lang:admin::lang.button_icon_back',
                    'class' => 'btn btn-outline-secondary',
                    'href' => 'igniterlabs/multivendor/commissionrules',
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
                    'data-request-confirm' => 'lang:admin::lang.alert_warning_confirm', 'context' => ['edit'],
                ],
            ],
        ],
        'fields' => [
            'name' => [
                'label' => 'lang:igniterlabs.multivendor::default.commission_rules.label_name',
                'type' => 'text',
                'span' => 'left',
            ],
            'priority' => [
                'label' => 'lang:igniterlabs.multivendor::default.commission_rules.label_priority',
                'type' => 'number',
                'span' => 'right',
            ],
            'fee_type' => [
                'label' => 'lang:igniterlabs.multivendor::default.commission_rules.label_fee_type',
                'type' => 'radiotoggle',
                'span' => 'left',
                'default' => 'fixed',
                'options' => [
                    'fixed' => 'igniterlabs.multivendor::default.commission_rules.text_fixed',
                    'percent' => 'igniterlabs.multivendor::default.commission_rules.text_percent',
                ],
            ],
            'fee' => [
                'label' => 'lang:igniterlabs.multivendor::default.commission_rules.label_fee',
                'type' => 'currency',
                'span' => 'right',
                'comment' => 'lang:igniterlabs.multivendor::default.commission_rules.help_fee',
            ],
            'conditions' => [
                'label' => 'lang:igniterlabs.multivendor::default.commission_rules.label_conditions',
                'type' => 'repeater',
                'sortable' => true,
                'commentAbove' => 'lang:igniterlabs.multivendor::default.commission_rules.help_conditions',
                'form' => [
                    'fields' => [
                        'priority' => [
                            'label' => 'lang:igniterlabs.multivendor::default.commission_rules.column_condition_priority',
                            'type' => 'hidden',
                        ],
                        'attribute' => [
                            'label' => 'lang:igniterlabs.multivendor::default.commission_rules.column_condition_attribute',
                            'type' => 'select',
                            'options' => 'getOrderAttributeOptions',
                        ],
                        'operator' => [
                            'label' => 'lang:igniterlabs.multivendor::default.commission_rules.column_condition_operator',
                            'type' => 'select',
                            'options' => 'getOperatorOptions',
                        ],
                        'value' => [
                            'label' => 'lang:igniterlabs.multivendor::default.commission_rules.column_condition_value',
                            'type' => 'text',
                        ],
                    ],
                ],
            ],
            'totals' => [
                'label' => 'lang:igniterlabs.multivendor::default.commission_rules.label_commission_totals',
                'type' => 'repeater',
                'commentAbove' => 'lang:igniterlabs.multivendor::default.commission_rules.help_commission_totals',
                'form' => [
                    'fields' => [
                        'code' => [
                            'label' => 'lang:igniterlabs.multivendor::default.commission_rules.label_commission_total_code',
                            'type' => 'select',
                            'options' => 'getCartTotalOptions',
                        ],
                        'action' => [
                            'label' => 'lang:igniterlabs.multivendor::default.commission_rules.label_commission_total_action',
                            'type' => 'select',
                            'options' => [
                                'exclude' => 'lang:igniterlabs.multivendor::default.text_exclude_total',
                                'include' => 'lang:igniterlabs.multivendor::default.text_include_total',
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
];
