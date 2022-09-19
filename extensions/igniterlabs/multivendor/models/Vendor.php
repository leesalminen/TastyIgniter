<?php

namespace IgniterLabs\MultiVendor\Models;

use Admin\Models\Locations_model;
use Admin\Models\Staffs_model;
use Admin\Models\Users_model;
use Igniter\Flame\Database\Model;
use Illuminate\Support\Facades\Event;
use System\Models\Languages_model;

/**
 * Vendor Model
 */
class Vendor extends Model
{
    /**
     * @var string The database table used by the model.
     */
    public $table = 'igniterlabs_multivendor_vendors';

    protected $guarded = [];

    public $timestamps = true;

    protected $casts = [
        'location_id' => 'integer',
        'staff_id' => 'integer',
        'apply_commission_on_coupons' => 'boolean',
        'is_enabled' => 'boolean',
    ];

    protected $dates = [
        'approved_at',
    ];

    public $relation = [
        'belongsTo' => [
            'location' => [\Admin\Models\Locations_model::class],
            'owner' => [\Admin\Models\Staffs_model::class, 'foreignKey' => 'staff_id', 'delete' => true],
        ],
        'belongsToMany' => [
            'commission_rules' => [
                CommissionRule::class,
                'table' => 'igniterlabs_multivendor_vendor_commission_rule',
            ],
        ],
        'hasMany' => [
            'locations' => [\Admin\Models\Locations_model::class, 'otherKey' => 'location_id', 'delete' => true],
            'staffs' => [\Admin\Models\Staffs_model::class, 'otherKey' => 'staff_id', 'delete' => true],
        ],
    ];

    public function createLocation(array $attributes)
    {
        $location = Locations_model::make();
        $location->location_name = array_get($attributes, 'name');
        $location->location_email = array_get($attributes, 'email');
        $location->location_telephone = array_get($attributes, 'telephone');
        $location->description = array_get($attributes, 'description');
        $location->location_address_1 = array_get($attributes, 'street');
        $location->location_city = array_get($attributes, 'city');
        $location->location_postcode = array_get($attributes, 'postcode');
        $location->location_country_id = array_get($attributes, 'country_id');
        $location->location_status = false;
        $location->save();

        $this->location = $location;

        return $location;
    }

    public function createOwner(array $attributes)
    {
        $staff = Staffs_model::firstOrNew(['staff_email' => $attributes['email']]);
        $staff->staff_name = $attributes['name'];
        $staff->staff_role_id = array_get($attributes, 'staff_role_id', Settings::vendorOwnerRole());
        $staff->language_id = Languages_model::first()->language_id;
        $staff->staff_status = false;
        $staff->save();

        $staff->locations()->attach($this->location->location_id);

        $user = Users_model::firstOrNew(['username' => $attributes['username']]);
        $user->staff_id = $staff->staff_id;
        $user->password = $attributes['password'];
        $user->super_user = false;
        $user->is_activated = false;
        $user->save();

        $this->owner = $staff;

        return $staff;
    }

    public function requiresApproval()
    {
        return empty($this->approved_at);
    }

    public function approve()
    {
        Event::fire('igniterlabs.multivendor.beforeVendorApprove', [$this]);

        $this->location->location_status = true;
        $this->location->save();

        $user = $this->owner->user;
        if (!$user->is_activated)
            $user->completeActivation($user->getActivationCode());

        $this->owner->staff_status = true;
        $this->owner->save();

        $this->is_enabled = true;
        $this->approved_at = now();
        $this->save();

        Event::fire('igniterlabs.multivendor.vendorApproved', [$this]);
    }

    public function reject()
    {
        $this->location->location_status = false;
        $this->location->save();

        $this->owner->staff_status = false;
        $this->owner->save();

        $this->is_enabled = false;
        $this->approved_at = null;
        $this->save();
    }

    //
    // Events
    //

    protected function beforeCreate()
    {
        if (array_has($this->attributes, ['restaurant', 'admin'])) {
            $this->createLocation($this->attributes['restaurant']);
            $this->createOwner($this->attributes['admin']);

            unset($this->attributes['restaurant'], $this->attributes['admin']);
        }
    }

    //
    // Scopes
    //

    public function scopeIsEnabled($query)
    {
        return $query->where('is_enabled', 1);
    }

    public function scopeIsApproved($query)
    {
        return $query->whereNotNull('approved_at');
    }
}
