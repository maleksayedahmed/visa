<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubheadingsTable extends Migration
{
    public function up()
    {
        Schema::create('subheadings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('blog_id')->constrained()->onDelete('cascade'); // Foreign key to Blog
            $table->string('title');    // Subheading title
            $table->text('content');    // Subheading content
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('subheadings');
    }
}
