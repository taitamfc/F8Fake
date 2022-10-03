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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('level_id')->constrained('levels');
            $table->string('title');
            $table->string('certificate_name');
            $table->string('slug');
            $table->longText('description');
            $table->longText('compeleted_content');
            $table->string('image');
            $table->string('icon');
            $table->string('content');
            $table->string('video_type');
            $table->string('video');
            $table->integer('pass_percent');
            $table->integer('priority');
            $table->integer('student_count');
            $table->integer('old_prive');
            $table->integer('price');
            $table->integer('pre_order_price');
            $table->string('is_relatable');
            $table->boolean('is_coming_soon');
            $table->boolean('is_pro');
            $table->boolean('is_completable');
            $table->datetime('published_at');
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
        Schema::dropIfExists('courses');
    }
};
