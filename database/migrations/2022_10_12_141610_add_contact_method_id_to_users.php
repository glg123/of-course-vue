<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddContactMethodIdToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('contact_method_id')->nullable()->after('goal')->references('id')->on('contact_methods')->onDelete('cascade');
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
                $table->dropForeign(['contact_method_id']);
                $table->dropColumn('contact_method_id');
            }
        });
    }
}
