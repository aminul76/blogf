<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
             $table->string('category_name');
             $table->integer('user_id');
             $table->integer('category_number');
             $table->integer('category_status');
                $table->text('category_short_description')->nullable();
                $table->text('category_description')->nullable();
                $table->string('image')->nullable();
                $table->string('fb_share_image')->nullable();
                $table->string('fb_title')->nullable();
                $table->text('fb_short_description')->nullable();
                $table->string('meta_title')->nullable();
                $table->text('meta_description')->nullable();
                $table->text('meta_keywords')->nullable();
                $table->string('image_title')->nullable();
                $table->text('custom_code')->nullable();
                $table->string('header_show')->nullable();
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
        Schema::dropIfExists('categories');
    }
}
