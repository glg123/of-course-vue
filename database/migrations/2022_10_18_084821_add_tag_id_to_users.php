<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTagIdToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('tag_id')->nullable()->after('country_code')->references('id')->on('tags')->onDelete('cascade');
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
                $table->dropForeign(['tag_id']);
                $table->dropColumn('tag_id');
            }
        });
    }
}
