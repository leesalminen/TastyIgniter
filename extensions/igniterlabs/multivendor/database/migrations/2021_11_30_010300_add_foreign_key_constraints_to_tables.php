<?php

namespace IgniterLabs\MultiVendor\Database\Migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyConstraintsToTables extends Migration
{
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        // Commented out so foreign keys are not added on new installations.
        // For existing installations, another migration has been added to drop all foreign keys.
//        Schema::table('igniterlabs_multivendor_commissions', function (Blueprint $table) {
//            $table->foreignId('location_id')->nullable()->change();
//            $table->foreign('location_id', 'multivendor_commissions_location_id_foreign')
//                ->references('location_id')
//                ->on('locations')
//                ->cascadeOnDelete()
//                ->cascadeOnUpdate();
//
//            $table->foreignId('order_id')->nullable()->change();
//            $table->foreign('order_id', 'multivendor_commissions_order_id_foreign')
//                ->references('order_id')
//                ->on('orders')
//                ->cascadeOnDelete()
//                ->cascadeOnUpdate();
//        });
//
//        Schema::table('igniterlabs_multivendor_cuisines', function (Blueprint $table) {
//            $table->foreignId('parent_id')->nullable()->change();
//            $table->foreign('parent_id', 'multivendor_cuisines_parent_id_foreign')
//                ->references('category_id')
//                ->on('categories')
//                ->nullOnDelete()
//                ->cascadeOnUpdate();
//        });
//
//        Schema::table('igniterlabs_multivendor_revision_history', function (Blueprint $table) {
//            $table->foreignId('revisionable_id')->nullable()->change();
//            $table->foreignId('location_id')->nullable()->change();
//            $table->foreign('location_id', 'multivendor_revision_history_location_id_foreign')
//                ->references('location_id')
//                ->on('locations')
//                ->cascadeOnDelete()
//                ->cascadeOnUpdate();
//        });
//
//        Schema::table('igniterlabs_multivendor_vendor_commission_rule', function (Blueprint $table) {
//            $table->foreignId('vendor_id')->change();
//            $table->foreign('vendor_id', 'multivendor_vendor_commission_rule_vendor_id_foreign')
//                ->references('id')
//                ->on('vendors')
//                ->cascadeOnDelete()
//                ->cascadeOnUpdate();
//        });
//
//        Schema::table('igniterlabs_multivendor_vendors', function (Blueprint $table) {
//            $table->foreignId('location_id')->nullable()->change();
//            $table->foreign('location_id', 'multivendor_vendors_location_id_foreign')
//                ->references('location_id')
//                ->on('locations')
//                ->cascadeOnDelete()
//                ->cascadeOnUpdate();
//
//            $table->foreignId('staff_id')->nullable()->change();
//            $table->foreign('staff_id', 'multivendor_vendors_staff_id_foreign')
//                ->references('staff_id')
//                ->on('staffs')
//                ->cascadeOnDelete()
//                ->cascadeOnUpdate();
//        });

        Schema::enableForeignKeyConstraints();
    }

    public function down()
    {
    }
}
