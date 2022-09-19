<?php

namespace IgniterLabs\MultiVendor\Database\Migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommissionsTable extends Migration
{
    public function up()
    {
        Schema::create('igniterlabs_multivendor_commissions', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('location_id')->unsigned()->index()->nullable();
            $table->integer('order_id')->unsigned()->index()->nullable();
            $table->string('type')->nullable();
            $table->string('fee_type')->nullable();
            $table->decimal('amount', 15, 4)->nullable();
            $table->decimal('fee', 15, 4)->nullable();
            $table->decimal('order_total', 15, 4)->nullable();
            $table->string('status_code')->nullable();
            $table->string('payment_code')->nullable();
            $table->timestamp('paid_at')->nullable();
            $table->timestamp('refunded_at')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('igniterlabs_multivendor_commissions');
    }
}
