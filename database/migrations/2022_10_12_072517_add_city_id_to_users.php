<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCityIdToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('block_id')->nullable()->after('country_code')->references('id')->on('locations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            if (app()->runningUnitTests()) {
                // Do nothing
                /** @see Blueprint::ensureCommandsAreValid */
            } else {
                $table->dropForeign(['city_id']);
                $table->dropColumn('city_id');
            }
        });
    }
}
