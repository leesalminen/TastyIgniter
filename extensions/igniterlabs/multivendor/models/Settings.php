<?php

namespace IgniterLabs\MultiVendor\Models;

use Admin\Models\Locations_model;
use Igniter\Flame\Database\Model;
use Illuminate\Support\Facades\Schema;
use System\Classes\ExtensionManager;

/**
 * @method static instance()
 */
class Settings extends Model
{
    public $implement = [\System\Actions\SettingsModel::class];

    public $settingsCode = 'igniterlabs_multivendor_settings';

    public $settingsFieldsConfig = 'settings';

    public static $disablePaymentOverride = false;

    public static function isConfigured()
    {
        return app()->hasDatabase()
            && Schema::hasTable(Vendor::make()->getTable())
            && config('system.locationMode') === Locations_model::LOCATION_CONTEXT_MULTIPLE;
    }

    public static function requireVendorApproval()
    {
        return (bool)self::get('require_vendor_approval', true);
    }

    public static function enablePaymentOverride()
    {
        return !self::$disablePaymentOverride && (bool)self::get('distinct_payment_settings');
    }

    public static function hideCustomerDetails()
    {
        return (bool)self::get('hide_customer_details');
    }

    public static function hidePaymentDetails()
    {
        return (bool)self::get('hide_payment_details');
    }

    public static function enableSharedLocationables()
    {
        return true;
    }

    public static function enableMenusLimit()
    {
        return (bool)self::get('enable_menus_limit');
    }

    public static function getMenusLimit()
    {
        return (int)self::get('menu_item_limit');
    }

    public static function getPayoutsGateway()
    {
        return self::get('payouts_gateway', 'disabled');
    }

    public static function vendorOwnerRole()
    {
        return (int)self::get('vendor_owner_role');
    }

    public static function vendorAdminRoles()
    {
        return self::get('vendor_admin_roles');
    }

    public static function hasGatewayExtension($code)
    {
        return ExtensionManager::instance()->hasExtension(
            $code == 'stripe' ? 'igniterlabs.stripeconnect' : 'igniterlabs.paypalpayouts'
        );
    }

    public static function listOrderCommissionRules($order)
    {
        if (!$rules = optional($order->location->vendor)->commission_rules)
            return null;

        return $rules->map(function ($rule) {
            return (object)[
                'id' => $rule->id,
                'fee' => $rule->fee,
                'name' => $rule->name,
                'type' => null,
                'total' => null,
                'fee_type' => $rule->fee_type,
                'priority' => $rule->priority,
                'conditions' => $rule->conditions,
                'totals' => $rule->totals,
            ];
        });
    }

    public function getPayoutsGatewayOptions()
    {
        return [
            'disabled' => [
                lang('admin::lang.text_disabled'),
                lang('igniterlabs.multivendor::default.text_disable_payouts'),
            ],
            'stripeconnect' => [
                lang('igniterlabs.multivendor::default.label_stripe_connect'),
                lang('igniterlabs.multivendor::default.help_stripe_connect')
                .(self::hasGatewayExtension('stripe') ? lang('igniterlabs.multivendor::default.text_requires_stripe_connect') : ''),
            ],
            'paypalpayouts' => [
                lang('igniterlabs.multivendor::default.label_paypal_payouts'),
                lang('igniterlabs.multivendor::default.help_paypal_payouts')
                .(self::hasGatewayExtension('paypal') ? lang('igniterlabs.multivendor::default.text_requires_paypal_payouts') : ''),
            ],
        ];
    }
}
