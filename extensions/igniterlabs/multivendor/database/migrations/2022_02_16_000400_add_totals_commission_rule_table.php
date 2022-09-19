<?php

namespace IgniterLabs\MultiVendor\Database\Migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTotalsCommissionRuleTable extends Migration
{
    public function up()
    {
        if (Schema::hasColumn('igniterlabs_multivendor_commission_rules', 'totals'))
            return;

        Schema::table('igniterlabs_multivendor_commission_rules', function (Blueprint $table) {
            $table->json('totals')->nullable();
        });

        Schema::table('igniterlabs_multivendor_commissions', function (Blueprint $table) {
            $table->json('total_codes')->nullable();
        });
    }

    public function down()
    {
        Schema::table('igniterlabs_multivendor_commission_rules', function (Blueprint $table) {
            $table->dropColumn('totals');
        });

        Schema::table('igniterlabs_multivendor_commissions', function (Blueprint $table) {
            $table->dropColumn('total_codes');
        });
    }
}
