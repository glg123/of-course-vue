<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBrandIdToFoods extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('foods', function (Blueprint $table) {
            $table->foreignId('brand_id')->nullable()->after('description')->references('id')->on('foods')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('foods', function (Blueprint $table) {
            if (app()->runningUnitTests()) {
                // Do nothing
                /** @see Blueprint::ensureCommandsAreValid */
            } else {
                $table->dropForeign(['brand_id']);
                $table->dropColumn('brand_id');
            }
        });
    }
}
