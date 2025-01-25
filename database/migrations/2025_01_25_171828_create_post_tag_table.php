<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_tag', function (Blueprint $table) {
            // Composite primary key
            $table->bigInteger('post_id')->unsigned();
            $table->bigInteger('tag_id')->unsigned();
            $table->primary(['post_id', 'tag_id']); // Composite key

            // Foreign keys
            $table->foreign('post_id')
                ->references('id')
                ->on('posts')
                ->onDelete('cascade'); // If a post is deleted, remove its tags

            $table->foreign('tag_id')
                ->references('id')
                ->on('tags')
                ->onDelete('cascade'); // If a tag is deleted, remove its associations

            // Timestamps for tracking when the association was created
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_tag');
    }
}
