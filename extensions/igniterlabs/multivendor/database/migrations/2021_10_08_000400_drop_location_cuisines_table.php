<?php

namespace IgniterLabs\MultiVendor\Database\Migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DropLocationCuisinesTable extends Migration
{
    protected int $defaultLocationId;

    public function up()
    {
        if (!Schema::hasTable('igniterlabs_multivendor_location_cuisines'))
            return;

        DB::table('igniterlabs_multivendor_location_cuisines')
            ->get()
            ->each(function ($record) {
                DB::table('locationables')
                    ->insert([
                        'location_id' => $record->location_id,
                        'locationable_id' => $record->cuisine_id,
                        'locationable_type' => 'cuisines',
                    ]);
            });

        Schema::dropIfExists('igniterlabs_multivendor_location_cuisines');
    }

    public function down()
    {
    }
}
