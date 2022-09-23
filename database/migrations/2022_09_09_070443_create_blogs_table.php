<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('parent_id');
            $table->string('title');
            $table->string('slug');
            $table->text('description');
            $table->string('meta_title');
            $table->text('meta_description');
            $table->string('thumbnail');
            $table->string('image');
            $table->text('content');
            $table->integer('min_read');
            $table->integer('view_count');
            $table->boolean('is_recommend');
            $table->boolean('is_approved');
            $table->date('published_at');
            $table->integer('reaction_count');
            $table->integer('comments_count');
            $table->boolean('is_reacted');
            $table->boolean('is_bookmark');
            $table->boolean('is_published');
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
        Schema::dropIfExists('blogs');
    }
};
