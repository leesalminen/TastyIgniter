<?php

namespace IgniterLabs\MultiVendor\Database\Migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakePrimaryKeyBigintAllTables extends Migration
{
    public function up()
    {
        foreach ([
            'igniterlabs_multivendor_commission_rules' => 'id',
            'igniterlabs_multivendor_commissions' => 'id',
            'igniterlabs_multivendor_cuisines' => 'cuisine_id',
            'igniterlabs_multivendor_revision_history' => 'id',
            'igniterlabs_multivendor_vendor_commission_rule' => 'commission_rule_id',
            'igniterlabs_multivendor_vendors' => 'id',
        ] as $table => $key) {
            Schema::table($table, function (Blueprint $table) use ($key) {
                $table->unsignedBigInteger($key, true)->change();
            });
        }
    }

    public function down()
    {
    }
}
