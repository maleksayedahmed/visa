<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCommentsTable extends Migration
{
    public function up(): void
    {
        Schema::table('comments', function (Blueprint $table) {
            // Drop the foreign key constraint before dropping the user_id column
            $table->dropForeign(['user_id']);  // Drop the foreign key constraint on user_id column

            // Drop the user_id column
            $table->dropColumn('user_id');

            // Add name and email columns
            $table->string('name');  // Name column to store the commenter's name
            $table->string('email'); // Email column to store the commenter's email
        });
    }

    public function down(): void
    {
        Schema::table('comments', function (Blueprint $table) {
            // In case of rollback, we need to restore the user_id column and drop name and email columns
            $table->unsignedBigInteger('user_id'); // Adding user_id column back
            $table->dropColumn(['name', 'email']); // Drop name and email columns
        });
    }
}

