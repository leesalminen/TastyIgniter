<?php

namespace IgniterLabs\MultiVendor\Database\Migrations;

use IgniterLabs\MultiVendor\Classes\Vendor;
use IgniterLabs\MultiVendor\Models\Settings;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class SeedMultiVendorRoles extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('staff_roles'))
            return;

        if (DB::table('staff_roles')->where('code', 'multivendor-owners')->exists())
            return;

        $ownerRoleId = DB::table('staff_roles')->insertGetId([
            'name' => 'Multi Vendor Owners',
            'code' => 'multivendor-owners',
            'description' => 'Default role for multi vendor owners',
            'permissions' => serialize(array_fill_keys(array_merge(Vendor::$basePermissions, Vendor::$ownerPermissions), '1')),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $adminRoleId = DB::table('staff_roles')->insertGetId([
            'name' => 'Multi Vendor Admins',
            'code' => 'multivendor-admins',
            'description' => 'Default role for multi vendor admins',
            'permissions' => serialize(array_fill_keys(Vendor::$basePermissions, '1')),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Settings::set([
            'vendor_owner_role' => $ownerRoleId,
            'vendor_admin_roles' => [$adminRoleId],
        ]);
    }

    public function down()
    {
    }
}
