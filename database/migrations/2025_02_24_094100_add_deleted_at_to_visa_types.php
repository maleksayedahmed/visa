<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('visa_types', function (Blueprint $table) {
        $table->softDeletes(); // Adds `deleted_at` column
    });
}


    /**
     * Reverse the migrations.
     */
    public function down()
{
    Schema::table('visa_types', function (Blueprint $table) {
        $table->dropSoftDeletes();
    });
}

};
