<?php

namespace IgniterLabs\MultiVendor\Models;

use Admin\Traits\Locationable;
use Igniter\Cart\Classes\CartConditionManager;
use Igniter\Flame\Database\Model;
use Igniter\Flame\Database\Traits\Sortable;
use Igniter\Flame\Database\Traits\Validation;

/**
 * CommissionRule Model
 */
class CommissionRule extends Model
{
    use Sortable;
    use Locationable;
    use Validation;

    const SORT_ORDER = 'priority';

    /**
     * @var string The database table used by the model.
     */
    public $table = 'igniterlabs_multivendor_commission_rules';

    protected $guarded = [];

    public $timestamps = true;

    protected $casts = [
        'fee' => 'float',
        'conditions' => 'json',
        'totals' => 'json',
        'priority' => 'integer',
    ];

    public $relation = [
        'belongsToMany' => [
            'vendors' => [Vendor::class, 'table' => 'igniterlabs_multivendor_vendor_commission_rule',],
        ],
    ];

    public $rules = [
        'name' => 'required|string',
        'fee_type' => 'in:fixed,percent',
        'fee' => 'numeric',
        'conditions.*.priority' => 'integer',
        'conditions.*.attribute' => 'alpha_dash',
        'conditions.*.operator' => 'alpha_dash',
        'conditions.*.value' => 'string',
        'priority' => 'integer',
    ];

    protected $orderAttributes = [
        'order_total' => 'Cart total',
        'total_items' => 'Cart total items',
        'order_type' => 'Order type (eg. delivery or collection)',
        'payment' => 'Payment Code (eg. cod or stripe)',
    ];

    protected $operators = [
        'is' => 'is',
        'is_not' => 'is not',
        'contains' => 'contains',
        'does_not_contain' => 'does not contain',
        'equals_or_greater' => 'equals or greater than',
        'equals_or_less' => 'equals or less than',
        'greater' => 'greater than',
        'less' => 'less than',
    ];

    public $calculatedFee = 0;

    public function getOrderAttributeOptions()
    {
        return $this->orderAttributes;
    }

    public function getOperatorOptions()
    {
        return $this->operators;
    }

    public function getCartTotalOptions()
    {
        return collect(CartConditionManager::instance()->listRegisteredConditions())->pluck('label', 'name');
    }
}
