<?php

namespace IgniterLabs\MultiVendor\Database\Migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class AttachLocationableItems extends Migration
{
    protected int $defaultLocationId;

    public function up()
    {
        $this->defaultLocationId = params('default_location_id');

        $this->attachCategories();
        $this->attachMenuOptions();
        $this->attachMenuItems();

        $this->attachTables();
        $this->attachMealtimes();
    }

    public function down()
    {
    }

    protected function attachCategories()
    {
        DB::table('categories')->get()->each(function ($record) {
            if ($this->locationableExists('categories', $record->category_id))
                return;

            DB::table('locationables')->insert([
                'location_id' => $this->defaultLocationId,
                'locationable_id' => $record->category_id,
                'locationable_type' => 'categories',
            ]);
        });
    }

    protected function attachMenuOptions()
    {
        DB::table('menu_options')->get()->each(function ($record) {
            if ($this->locationableExists('menu_options', $record->option_id))
                return;

            DB::table('locationables')->insert([
                'location_id' => $this->defaultLocationId,
                'locationable_id' => $record->option_id,
                'locationable_type' => 'menu_options',
            ]);
        });
    }

    protected function attachMenuItems()
    {
        DB::table('menus')->get()->each(function ($record) {
            if ($this->locationableExists('menus', $record->menu_id))
                return;

            DB::table('locationables')->insert([
                'location_id' => $this->defaultLocationId,
                'locationable_id' => $record->menu_id,
                'locationable_type' => 'menus',
            ]);
        });
    }

    protected function attachTables()
    {
        DB::table('tables')->get()->each(function ($record) {
            if ($this->locationableExists('tables', $record->table_id))
                return;

            DB::table('locationables')->insert([
                'location_id' => $this->defaultLocationId,
                'locationable_id' => $record->table_id,
                'locationable_type' => 'tables',
            ]);
        });
    }

    protected function attachMealtimes()
    {
        DB::table('mealtimes')->get()->each(function ($record) {
            if ($this->locationableExists('mealtimes', $record->mealtime_id))
                return;

            DB::table('locationables')->insert([
                'location_id' => $this->defaultLocationId,
                'locationable_id' => $record->mealtime_id,
                'locationable_type' => 'mealtimes',
            ]);
        });
    }

    protected function locationableExists($type, $id)
    {
        return DB::table('locationables')
            ->where('locationable_type', $type)
            ->where('locationable_id', $id)
            ->exists();
    }
}
