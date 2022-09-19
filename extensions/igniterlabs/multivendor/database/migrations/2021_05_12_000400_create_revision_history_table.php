<?php

namespace IgniterLabs\MultiVendor\Database\Migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRevisionHistoryTable extends Migration
{
    public function up()
    {
        Schema::create('igniterlabs_multivendor_revision_history', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('location_id')->unsigned()->index('revision_history_location_id')->nullable();
            $table->string('revisionable_type')->index('revision_history_revisionable_type')->nullable();
            $table->integer('revisionable_id')->unsigned()->index('revision_history_revisionable_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->longText('model_attributes')->nullable();
            $table->string('reason', 100)->nullable();
            $table->timestamps();
        });

        if (Schema::hasColumn('menus', 'is_pending_review'))
            return;

        Schema::table('menus', function (Blueprint $table) {
            $table->boolean('is_pending_review')->default(0);
        });
    }

    public function down()
    {
        Schema::dropIfExists('igniterlabs_multivendor_revision_history');

        if (!Schema::hasColumn('menus', 'is_pending_review'))
            return;

        Schema::table('menus', function (Blueprint $table) {
            $table->dropColumn('is_pending_review');
        });
    }
}
