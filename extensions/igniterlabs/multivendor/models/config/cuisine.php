<?php

return [
    'list' => [
        'filter' => [
            'search' => [
                'prompt' => 'igniterlabs.multivendor::default.cuisine.text_filter_search',
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
                    'conditions' => 'status = :filtered',
                ],
            ],
        ],
        'toolbar' => [
            'buttons' => [
                'back' => [
                    'label' => 'lang:admin::lang.button_icon_back',
                    'class' => 'btn btn-outline-secondary',
                    'href' => 'menus',
                ],
                'create' => [
                    'label' => 'lang:admin::lang.button_new',
                    'class' => 'btn btn-primary',
                    'href' => 'igniterlabs/multivendor/cuisines/create',
                ],
            ],
        ],
        'bulkActions' => [
            'status' => [
                'label' => 'lang:admin::lang.list.actions.label_status',
                'type' => 'dropdown',
                'class' => 'btn btn-light',
                'statusColumn' => 'status',
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
                    'href' => 'igniterlabs/multivendor/cuisines/edit/{cuisine_id}',
                ],
            ],
            'name' => [
                'label' => 'igniterlabs.multivendor::default.cuisine.column_name',
            ],
            'parent' => [
                'label' => 'igniterlabs.multivendor::default.cuisine.column_parent',
                'type' => 'text',
                'relation' => 'parent_cat',
                'select' => 'name',
            ],
            'location_name' => [
                'label' => 'lang:admin::lang.column_location',
                'type' => 'text',
                'relation' => 'locations',
                'select' => 'location_name',
                'locationAware' => true,
                'invisible' => true,
            ],
            'status' => [
                'label' => 'lang:admin::lang.label_status',
                'type' => 'switch',
            ],
            'priority' => [
                'label' => 'igniterlabs.multivendor::default.cuisine.column_priority',
            ],
        ],
    ],
    'form' => [
        'toolbar' => [
            'buttons' => [
                'back' => [
                    'label' => 'lang:admin::lang.button_icon_back',
                    'class' => 'btn btn-outline-secondary',
                    'href' => 'igniterlabs/multivendor/cuisines',
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
                'label' => 'igniterlabs.multivendor::default.cuisine.label_name',
                'type' => 'text',
            ],
            'description' => [
                'label' => 'igniterlabs.multivendor::default.cuisine.label_description',
                'type' => 'textarea',
            ],
            'parent_id' => [
                'label' => 'igniterlabs.multivendor::default.cuisine.label_parent',
                'type' => 'relation',
                'span' => 'left',
                'relationFrom' => 'parent_cat',
                'placeholder' => 'lang:admin::lang.text_please_select',
            ],
            'locations' => [
                'label' => 'lang:admin::lang.label_location',
                'type' => 'relation',
                'span' => 'right',
                'valueFrom' => 'locations',
                'nameFrom' => 'location_name',
            ],
            'status' => [
                'label' => 'lang:admin::lang.label_status',
                'type' => 'switch',
                'span' => 'left',
                'default' => 1,
            ],
            'priority' => [
                'label' => 'igniterlabs.multivendor::default.cuisine.label_priority',
                'type' => 'number',
                'span' => 'right',
            ],
        ],
    ],
];
