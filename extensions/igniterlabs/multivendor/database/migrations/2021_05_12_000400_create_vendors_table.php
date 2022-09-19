<?php

namespace IgniterLabs\MultiVendor\Database\Migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorsTable extends Migration
{
    public function up()
    {
        Schema::create('igniterlabs_multivendor_vendors', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name')->nullable();
            $table->integer('location_id')->unsigned()->index()->nullable();
            $table->integer('staff_id')->unsigned()->index()->nullable();
            $table->text('commission_rules')->nullable();
            $table->boolean('apply_commission_on_coupons')->nullable();
            $table->string('apply_commission_taxes')->nullable();
            $table->boolean('is_enabled')->default(0);
            $table->timestamp('approved_at')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('igniterlabs_multivendor_vendors');
    }
}
