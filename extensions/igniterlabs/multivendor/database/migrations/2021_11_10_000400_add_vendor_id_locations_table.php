<?php

namespace IgniterLabs\MultiVendor\Database\Migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddVendorIdLocationsTable extends Migration
{
    public function up()
    {
        if (Schema::hasColumn('locations', 'vendor_id'))
            return;

        Schema::table('locations', function (Blueprint $table) {
            $table->bigInteger('vendor_id')->nullable();
        });

        DB::table('igniterlabs_multivendor_vendors')
            ->get()
            ->each(function ($record) {
                DB::table('locations')
                    ->where('location_id', $record->location_id)
                    ->update(['vendor_id' => $record->id]);
            });
    }

    public function down()
    {
        Schema::table('locations', function (Blueprint $table) {
            $table->dropColumn('vendor_id');
        });
    }
}
