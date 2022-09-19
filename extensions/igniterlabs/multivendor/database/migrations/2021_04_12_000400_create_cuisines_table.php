<?php

namespace IgniterLabs\MultiVendor\Database\Migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateCuisinesTable extends Migration
{
    public function up()
    {
        Schema::create('igniterlabs_multivendor_cuisines', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('cuisine_id');
            $table->integer('parent_id')->unsigned()->index()->nullable();
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('permalink_slug')->nullable();
            $table->integer('nest_left')->nullable();
            $table->integer('nest_right')->nullable();
            $table->integer('priority')->default(0);
            $table->boolean('status')->default(0);
            $table->timestamps();
        });

        Schema::create('igniterlabs_multivendor_location_cuisines', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('location_id')->unsigned()->index();
            $table->integer('cuisine_id')->unsigned()->index();
            $table->unique(['location_id', 'cuisine_id'], 'menu_cuisines_location_id_cuisine_id');
        });

        DB::table('igniterlabs_multivendor_cuisines')->insert([
            [
                'name' => 'Continental',
                'description' => 'Serves continental dishes',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Thai',
                'description' => 'Serves Thai dishes',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Chinese',
                'description' => 'Serves Chinese dishes',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('igniterlabs_multivendor_cuisines');
        Schema::dropIfExists('igniterlabs_multivendor_location_cuisines');
    }
}
