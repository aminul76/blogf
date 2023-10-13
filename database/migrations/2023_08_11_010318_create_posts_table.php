<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('post_title');
            $table->string('post_number');
            $table->text('post_short_description');
            $table->text('post_description');
            $table->string('post_image');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('user_id');
            $table->integer('post_position');
            $table->boolean('status')->default(true);
            $table->boolean('post_home_show')->default(false);
            $table->boolean('post_slide')->default(false);

            $table->string('fb_title')->nullable();
            
            $table->string('fb_image')->nullable();
            $table->text('fb_short_description')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_keyword')->nullable();
            $table->string('post_custom_url')->nullable();
            $table->text('post_custom_code')->nullable();
            $table->timestamps();
    
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
