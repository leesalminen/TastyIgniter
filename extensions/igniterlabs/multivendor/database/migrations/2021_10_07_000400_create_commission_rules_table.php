<?php

namespace IgniterLabs\MultiVendor\Database\Migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommissionRulesTable extends Migration
{
    public function up()
    {
        Schema::create('igniterlabs_multivendor_commission_rules', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->string('fee_type')->nullable();
            $table->decimal('fee', 15, 4)->nullable();
            $table->json('conditions')->nullable();
            $table->integer('priority')->default(0);
            $table->timestamps();
        });

        Schema::create('igniterlabs_multivendor_vendor_commission_rule', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('commission_rule_id')->unsigned();
            $table->integer('vendor_id')->unsigned();
            $table->primary(['commission_rule_id', 'vendor_id'], 'vendor_commission_rule');
        });

        if (Schema::hasColumn('igniterlabs_multivendor_commissions', 'rule_id'))
            return;

        Schema::table('igniterlabs_multivendor_vendors', function (Blueprint $table) {
            $table->dropColumn('commission_rules');
            $table->dropColumn('apply_commission_on_coupons');
            $table->dropColumn('apply_commission_taxes');
        });

        Schema::table('igniterlabs_multivendor_commissions', function (Blueprint $table) {
            $table->integer('rule_id')->unsigned()->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('igniterlabs_multivendor_commission_rules');
        Schema::dropIfExists('igniterlabs_multivendor_vendor_commission_rule');
    }
}
