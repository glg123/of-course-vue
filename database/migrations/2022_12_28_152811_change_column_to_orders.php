<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnToOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->foreignId('address_id')->nullable()->after('days')->references('id')->on('addresses')->onDelete('cascade');
            $table->dropForeign(['area_id']);
            $table->dropForeign(['block_id']);
            $table->dropForeign(['zone_id']);
            $table->dropForeign(['meal_id']);
            $table->dropColumn('area_id');
            $table->dropColumn('block_id');
            $table->dropColumn('zone_id');
            $table->dropColumn('meal_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['address_id']);
            $table->dropColumn('address_id');
            $table->foreignId('area_id')->nullable()->references('id')->on('locations')->onDelete('cascade');
            $table->foreignId('block_id')->nullable()->references('id')->on('locations')->onDelete('cascade');
            $table->foreignId('zone_id')->nullable()->references('id')->on('zones')->onDelete('cascade');
            $table->foreignId('meal_id')->nullable()->references('id')->on('meals')->onDelete('cascade');
        });
    }
}
