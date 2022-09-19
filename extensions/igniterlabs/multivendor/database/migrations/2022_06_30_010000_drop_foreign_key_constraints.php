<?php

namespace IgniterLabs\MultiVendor\Database\Migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DropForeignKeyConstraints extends Migration
{
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::table('igniterlabs_multivendor_commissions', function (Blueprint $table) {
            $table->dropForeignKeyIfExists('location_id');
            $table->dropForeignKeyIfExists('order_id');
            $table->dropIndexIfExists(sprintf('%s%s_%s_foreign', DB::getTablePrefix(), 'igniterlabs_multivendor_commissions', 'location_id'));
            $table->dropIndexIfExists(sprintf('%s%s_%s_foreign', DB::getTablePrefix(), 'igniterlabs_multivendor_commissions', 'order_id'));
        });

        Schema::table('igniterlabs_multivendor_cuisines', function (Blueprint $table) {
            $table->dropForeignKeyIfExists('parent_id');
            $table->dropIndexIfExists(sprintf('%s%s_%s_foreign', DB::getTablePrefix(), 'igniterlabs_multivendor_cuisines', 'parent_id'));
        });

        Schema::table('igniterlabs_multivendor_revision_history', function (Blueprint $table) {
            $table->dropForeignKeyIfExists('revisionable_id');
            $table->dropForeignKeyIfExists('location_id');
            $table->dropIndexIfExists(sprintf('%s%s_%s_foreign', DB::getTablePrefix(), 'igniterlabs_multivendor_revision_history', 'revisionable_id'));
            $table->dropIndexIfExists(sprintf('%s%s_%s_foreign', DB::getTablePrefix(), 'igniterlabs_multivendor_revision_history', 'location_id'));
        });

        Schema::table('igniterlabs_multivendor_vendor_commission_rule', function (Blueprint $table) {
            $table->dropForeignKeyIfExists('vendor_id');
            $table->dropIndexIfExists(sprintf('%s%s_%s_foreign', DB::getTablePrefix(), 'igniterlabs_multivendor_vendor_commission_rule', 'vendor_id'));
        });

        Schema::table('igniterlabs_multivendor_vendors', function (Blueprint $table) {
            $table->dropForeignKeyIfExists('location_id');
            $table->dropForeignKeyIfExists('staff_id');
            $table->dropIndexIfExists(sprintf('%s%s_%s_foreign', DB::getTablePrefix(), 'igniterlabs_multivendor_vendors', 'location_id'));
            $table->dropIndexIfExists(sprintf('%s%s_%s_foreign', DB::getTablePrefix(), 'igniterlabs_multivendor_vendors', 'staff_id'));
        });

        Schema::enableForeignKeyConstraints();
    }

    public function down()
    {
    }
}
