<?php

namespace IgniterLabs\MultiVendor\Database\Migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddVendorIdStaffsTable extends Migration
{
    public function up()
    {
        if (Schema::hasColumn('staffs', 'vendor_id'))
            return;

        Schema::table('staffs', function (Blueprint $table) {
            $table->bigInteger('vendor_id')->nullable();
        });

        DB::table('igniterlabs_multivendor_vendors')
            ->get()
            ->each(function ($record) {
                DB::table('staffs')
                    ->where('staff_id', $record->staff_id)
                    ->update(['vendor_id' => $record->id]);
            });
    }

    public function down()
    {
        Schema::table('staffs', function (Blueprint $table) {
            $table->dropColumn('vendor_id');
        });
    }
}
