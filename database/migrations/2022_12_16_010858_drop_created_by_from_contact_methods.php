<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropCreatedByFromContactMethods extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasColumn('contact_methods', 'created_by')) {
            Schema::table('contact_methods', function (Blueprint $table) {
                // Drop Old Column
                $table->dropForeign(['created_by']);
                $table->dropColumn('created_by');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contact_methods', function (Blueprint $table) {
            //
        });
    }
}
