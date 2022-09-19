<?php

namespace IgniterLabs\MultiVendor\Classes;

use Admin\Facades\AdminAuth;
use Igniter\Flame\Traits\Singleton;
use IgniterLabs\MultiVendor\Models\Settings;
use IgniterLabs\MultiVendor\Models\Vendor as VendorModel;

class Vendor
{
    use Singleton;

    protected $staff;

    public static $ownerPermissions = [
        'Admin.Staffs',
        'Admin.DeleteOrders',
        'Admin.DeleteReservations',
        'IgniterLabs.MultiVendor.Commissions',
    ];

    public static $basePermissions = [
        'Admin.Dashboard',
        'Admin.Coupons',
        'Admin.Categories',
        'Admin.Customers',
        'Admin.Menus',
        'Admin.Mealtimes',
        'Admin.Locations',
        'Admin.Tables',
        'Admin.Orders',
        'Admin.Reservations',
        'Admin.Reviews',
        'Admin.AssignOrders',
        'Admin.AssignReservations',
        'Admin.MediaManager',
    ];

    public function register(array $data, bool $approve = false)
    {
        $vendor = VendorModel::make();

        $vendor->name = array_get($data, 'name');
        $location = $vendor->createLocation($data);
        $owner = $vendor->createOwner($data['admin']);
        $vendor->save();

        $location->vendor_id = $vendor->id;
        $location->save();

        $owner->vendor_id = $vendor->id;
        $owner->save();

        if ($approve) {
            $vendor->approve();
        }

        return $vendor;
    }

    public function current()
    {
        if (!$this->isUser())
            return null;

        return AdminAuth::staff()->vendor;
    }

    public function isUser($staff = null)
    {
        return $this->isOwner($staff) OR $this->isAdmin($staff);
    }

    public function isOwner($staff = null)
    {
        $staff = $staff ?? AdminAuth::staff();

        if (!$staff) return false;

        return $staff->staff_role_id === (int)Settings::vendorOwnerRole();
    }

    public function isAdmin($staff = null)
    {
        $staff = $staff ?? AdminAuth::staff();

        if (!$staff) return false;

        return in_array($staff->staff_role_id, (array)Settings::vendorAdminRoles());
    }
}
