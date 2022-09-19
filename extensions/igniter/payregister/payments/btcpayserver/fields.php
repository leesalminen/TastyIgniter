<?php

return [
    'fields' => [
        'btcpayserver_url' => [
            'label' => 'lang:igniter.payregister::default.btcpayserver.btcpayserver_url',
            'type' => 'text',
        ],
        'btcpayserver_api_key' => [
            'label' => 'lang:igniter.payregister::default.btcpayserver.btcpayserver_api_key',
            'type' => 'text',
        ],
        'btcpayserver_store_id' => [
            'label' => 'lang:igniter.payregister::default.btcpayserver.btcpayserver_store_id',
            'type' => 'text',
        ],
        'order_status' => [
            'label' => 'lang:igniter.payregister::default.label_order_status',
            'type' => 'select',
            'options' => [\Admin\Models\Statuses_model::class, 'getDropdownOptionsForOrder'],
            'comment' => 'lang:igniter.payregister::default.help_order_status',
        ],
    ],
    'rules' => [
        ['btcpayserver_url', 'lang:igniter.payregister::default.btcpayserver.btcpayserver_url', 'string'],
        ['btcpayserver_api_key', 'lang:igniter.payregister::default.btcpayserver.btcpayserver_api_key', 'string'],
        ['btcpayserver_store_id', 'lang:igniter.payregister::default.btcpayserver.btcpayserver_store_id', 'string'],
        ['order_status', 'lang:igniter.payregister::default.label_order_status', 'integer'],
    ],
];
