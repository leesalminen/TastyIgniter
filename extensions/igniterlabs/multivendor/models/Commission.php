<?php

namespace IgniterLabs\MultiVendor\Models;

use Admin\Models\Locations_model;
use Admin\Models\Orders_model;
use Admin\Traits\Locationable;
use Igniter\Flame\Database\Model;
use IgniterLabs\CommissionCalculator\Calculator;

/**
 * Commission Model
 */
class Commission extends Model
{
    use Locationable;

    public const STATUS_DRAFT = 'draft';
    public const STATUS_PENDING = 'pending';
    public const STATUS_PAID = 'paid';
    public const STATUS_REFUNDED = 'refunded';
    public const STATUS_VOID = 'void';

    /**
     * @var string The database table used by the model.
     */
    public $table = 'igniterlabs_multivendor_commissions';

    protected $guarded = [];

    public $timestamps = true;

    protected $casts = [
        'location_id' => 'integer',
        'rule_id' => 'integer',
        'order_id' => 'integer',
        'fee' => 'float',
        'order_total' => 'float',
        'total_codes' => 'json',
    ];

    protected $dates = [
        'paid_at', 'refunded_at',
    ];

    public $relation = [
        'belongsTo' => [
            'location' => [Locations_model::class, 'foreignId' => 'location_id'],
            'order' => [Orders_model::class],
        ],
    ];

    public static function getStatusCodeOptions()
    {
        return [
            self::STATUS_DRAFT => 'lang:igniterlabs.multivendor::default.commissions.text_status_draft',
            self::STATUS_PENDING => 'lang:igniterlabs.multivendor::default.commissions.text_status_pending',
            self::STATUS_PAID => 'lang:igniterlabs.multivendor::default.commissions.text_status_paid',
            self::STATUS_REFUNDED => 'lang:igniterlabs.multivendor::default.commissions.text_status_refunded',
            self::STATUS_VOID => 'lang:igniterlabs.multivendor::default.commissions.text_status_void',
        ];
    }

    public static function calculate(Orders_model $order, $rules)
    {
        return Calculator::on($order)
            ->withRules($rules)
            ->withTotals($order->getOrderTotals())
            ->whenMatched(function ($rule, $orderTotal) use ($order) {
                self::addOrderTotal($order, $rule);
                self::createCommission($order, $rule, $orderTotal);
            })
            ->calculate();
    }

    public static function createCommission(Orders_model $order, $rule, $orderTotal, string $statusCode = null)
    {
        if (is_null($statusCode))
            $statusCode = self::STATUS_DRAFT;

        $commission = new static;
        $commission->order_id = $order->getKey();
        $commission->rule_id = $rule->id ?? null;
        $commission->location_id = $order->location->getKey();
        $commission->fee_type = $rule->fee_type;
        $commission->fee = $rule->fee;
        $commission->amount = $rule->calculatedFee;
        $commission->order_total = $orderTotal;
        $commission->status_code = $statusCode;
        $commission->payment_code = $order->payment;
        $commission->total_codes = $rule->calculatedTotals ?: null;

        if ($commission->fireSystemEvent('igniterlabs.multivendor.beforeAddCommission', [$order, $rule], true) === false)
            return false;

        $commission->save();

        return $commission;
    }

    protected static function addOrderTotal(Orders_model $order, $rule)
    {
        $titlePrefix = $rule->fee_type === 'percent'
            ? '%'.$rule->fee
            : currency_format($rule->fee);

        $order->orderTotalsQuery()->insert([
            'order_id' => $order->getKey(),
            'code' => 'commission',
            'title' => sprintf('%s (%s)', $rule->name, $titlePrefix),
            'value' => 0 - $rule->calculatedFee,
            'priority' => 9999,
            'is_summable' => false,
        ]);
    }

    public function isPaid()
    {
        return $this->status_code === static::STATUS_PAID;
    }
}
