<?php

return [
    'list' => [
        'filter' => [
            'search' => [
                'prompt' => 'igniterlabs.multivendor::default.revision_history.text_filter_search',
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
            ],
        ],
        'toolbar' => [
            'buttons' => [
                'back' => [
                    'label' => 'lang:admin::lang.button_icon_back',
                    'class' => 'btn btn-outline-secondary',
                    'href' => 'igniterlabs/multivendor/vendors',
                ],
                'delete' => [
                    'label' => 'lang:admin::lang.button_delete',
                    'class' => 'btn btn-danger',
                    'data-attach-loading' => '',
                    'data-request-form' => '#list-form',
                    'data-request' => 'onDelete',
                    'data-request-data' => "_method:'DELETE'",
                    'data-request-confirm' => 'lang:admin::lang.alert_warning_confirm',
                ],
            ],
        ],
        'columns' => [
            'edit' => [
                'type' => 'button',
                'iconCssClass' => 'fa fa-pencil',
                'attributes' => [
                    'class' => 'btn btn-edit',
                    'href' => 'igniterlabs/multivendor/revision_history/edit/{id}',
                ],
            ],
//            'name' => [
//                'label' => 'igniterlabs.multivendor::default.cuisine.column_name',
//            ],
//            'status' => [
//                'label' => 'lang:admin::lang.label_status',
//                'type' => 'switch',
//            ],
            'updated_at' => [
                'label' => 'lang:admin::lang.column_date_updated',
                'type' => 'timetense',
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
                    'href' => 'igniterlabs/multivendor/revision_history',
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
