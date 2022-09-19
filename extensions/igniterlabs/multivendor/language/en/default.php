<?php

return [
    'text_title_payment' => 'Edit Payment: %s',
    'text_tab_general' => 'General',
    'text_tab_commissions' => 'Commissions',
    'text_tab_payouts' => 'Payouts',
    'text_exclude_total' => 'Credit to vendor',
    'text_include_total' => 'Credit to site administrator',
    'text_split_total' => 'Split between vendor and site administrator',
    'text_fixed' => 'Fixed',
    'text_percent' => 'Percentage',
    'text_commissions' => 'Commissions (%s)',
    'text_disable_payouts' => 'Disable payouts, but configured commissions will still be reported.',
    'text_requires_stripe_connect' => ' - <span class="text-danger">Requires Multi Vendor Stripe Connect Extension</span>',
    'text_requires_paypal_payouts' => ' - <span class="text-danger">Requires Multi Vendor PayPal Payouts Extension</span>',
    'text_approving' => 'Approving...',
    'text_rejecting' => 'Rejecting...',

    'side_menu_vendors' => 'Vendors',
    'side_menu_revisions' => 'Revision History',
    'side_menu_commissions' => 'Commissions',

    'setting_title' => 'Multi Vendor Settings',
    'setting_desc' => 'Configure multivendor settings.',

    'label_name' => 'Name',
    'label_description' => 'Description',
    'label_admin_name' => 'Admin Name',
    'label_admin_email' => 'Admin Email',
    'label_admin_username' => 'Admin Username',
    'label_admin_password' => 'Admin Password',
    'label_admin_confirm_password' => 'Confirm Admin Password',
    'label_street' => 'Street',
    'label_city' => 'City',
    'label_postcode' => 'Postcode',
    'label_country' => 'Country',
    'label_telephone' => 'Telephone',
    'label_email' => 'Email',
    'label_require_vendor_approval' => 'Require approval for vendor accounts',
    'label_require_menu_approval' => 'Require admin approval',
    'label_distinct_payment' => 'Distinct vendor payment preferences',
    'label_payouts_gateway' => 'Commissions payouts gateway/service',
    'label_hide_customer_details' => 'Hide customer details',
    'label_hide_payment_details' => 'Hide payment details',
    'label_enable_menus_limit' => 'Limit number of menu items',
    'label_menu_item_limit' => 'Menu item limit',
    'label_vendor_owner_role' => 'Vendor owner role',
    'label_vendor_admin_roles' => 'Vendor admin roles',
    'label_stripe_connect' => 'Stripe Connect',
    'label_paypal_payouts' => 'PayPal Payouts',

    'button_approve' => 'Approve',
    'button_reject' => 'Reject',
    'button_cuisines' => 'Cuisines',

    'help_email' => 'Enter a valid email for the restaurant',
    'help_admin_email' => 'Enter a valid email for the staff account',
    'help_require_vendor_approval' => 'Enable to require admin approval on newly created vendor accounts',
    'help_require_menu_approval' => 'Disable to allow vendors to create and manage menu items without admin approval.',
    'help_distinct_payment' => 'Enable this option to allow each vendor to configure their own payment preferences. When this option is enabled, commission payouts are disabled.',
    'help_hide_customer_details' => 'Prevent vendors from seeing the customer information in order details.',
    'help_hide_payment_details' => 'Prevent vendors from seeing the payment information in order details.',
    'help_enable_menus_limit' => 'Limit the number of menu items each vendor can create.',
    'help_menu_item_limit' => 'Set the maximum number of menu items that can be created by each location.',
    'help_vendor_owner_role' => 'Staff role used by vendor owners.',
    'help_vendor_admin_roles' => 'Staff roles used by vendor admins',
    'help_payouts_gateway' => 'The selected payment gateway will be used to send payouts to vendors.',
    'help_stripe_connect' => 'Payout vendors automatically using Stripe Connect',
    'help_paypal_payouts' => 'Payout vendors automatically using PayPal Payouts',

    'alert_location_approved' => 'Location approved successfully',
    'alert_location_rejected' => 'Location rejected successfully',
    'alert_menu_limit' => 'You have reached the maximum number of menu items you can create.',
    'alert_cannot_be_deleted' => 'Warning: You can not delete this record, please contact the system administrator.',

    'cuisine' => [
        'text_title' => 'Cuisines',
        'text_filter_search' => 'Search by cuisine name.',

        'column_name' => 'Name',
        'column_parent' => 'Parent',
        'column_priority' => 'Priority',
        'label_name' => 'Name',
        'label_description' => 'Description',
        'label_parent' => 'Parent',
        'label_priority' => 'Priority',
    ],

    'commissions' => [
        'text_title' => 'Commissions',
        'text_filter_search' => 'Search by order ID.',
        'text_status_draft' => 'Draft',
        'text_status_pending' => 'Pending',
        'text_status_paid' => 'Paid',
        'text_status_refunded' => 'Refunded',
        'text_status_void' => 'Void',

        'column_fee_type' => 'Fee Type',
        'column_fee' => 'Fee',
        'column_amount' => 'Amount',
        'column_order_id' => 'Order ID',
        'column_status' => 'Status',
        'column_order_total' => 'Order total',
        'column_paid_at' => 'Paid At',
        'column_refunded_at' => 'Refunded At',
    ],

    'commission_rules' => [
        'text_title' => 'Commission Rules',
        'text_fixed' => 'Fixed',
        'text_percent' => 'Percentage',

        'column_condition_priority' => 'Priority',
        'column_condition_attribute' => 'Attribute',
        'column_condition_operator' => 'Operator',
        'column_condition_value' => 'Value',
        'column_total_code' => 'Total',
        'column_total_action' => 'Action',

        'label_name' => 'Name',
        'label_fee_type' => 'Fee Type',
        'label_fee' => 'Fee',
        'label_order_type' => 'Order Type',
        'label_conditions' => 'Conditions',
        'label_totals' => 'Order Totals',
        'label_priority' => 'Priority',
        'label_vendor' => 'Vendor(s)',
        'label_commission_totals' => 'Commission Totals',
        'label_commission_total_code' => 'Total',
        'label_commission_total_action' => 'Action',

        'button_rules' => 'Commission Rules',

        'help_fee' => 'How much to deduct from each order',
        'help_conditions' => 'When these conditions are met collect the commission fee from the matching order',
        'help_commission_totals' => 'Configure how to handle cart total items when calculating commissions for a matching order.',
    ],

    'vendors' => [
        'text_title' => 'Vendors',
        'text_filter_search' => 'Search by vendor name.',

        'column_vendor' => 'Vendor',
        'column_location' => 'Location',
        'column_staff' => 'Owner',
        'column_status' => 'Status',
        'column_approved_at' => 'Approved Since',
        'column_updated_at' => 'Updated On',
        'column_created_at' => 'Registered Since',

        'label_name' => 'Vendor Name',
        'label_location' => 'Vendor Location',
        'label_default_location' => 'Vendor Default Location',
        'label_locations' => 'Vendor Location(s)',
        'label_owner' => 'Vendor Owner',
        'label_staff' => 'Vendor Staff(s)',
        'label_approved_at' => 'Vendor Approved Since',
        'label_created_at' => 'Vendor Registered Since',
        'label_restaurant_info' => 'Restaurant Details',
        'label_admin_info' => 'Admin Details',
        'label_commission_rule' => 'Commission Rule(s)',

        'help_commission_rule' => 'Configure commission rules from Sales > Commissions > Rules',
    ],

    'revision_history' => [
        'text_title' => 'Revision History',
        'text_filter_search' => 'Search by menu name.',

    ],

    'permission' => [
        'manage' => 'Manage Multi Vendor settings',
        'vendors' => 'Create, edit and delete vendors',
        'commissions' => 'View and manage commissions',
        'cuisines' => 'Create, edit and delete cuisines',
    ],

    'locations' => [
        'label_cuisines' => 'Cuisines',

        'help_cuisines' => '',
    ],

    'menus' => [
        'label_is_pending_review' => 'Is Pending Review',

        'help_cuisines' => '',
    ],
];
