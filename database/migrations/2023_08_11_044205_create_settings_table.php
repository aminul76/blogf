<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('website_name');
            $table->string('website_title');
            $table->text('website_short_description');
            $table->string('website_logo')->nullable();
            $table->string('website_favicon')->nullable();
            $table->string('website_fb');
            $table->string('website_wp');
            $table->string('website_yt');
            $table->string('website_tw');
            $table->string('website_ln');
            $table->string('website_phone_number');
            $table->string('website_email');
            $table->string('website_address');
            $table->string('website_banner')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_keyword')->nullable();
            $table->string('logo_title')->nullable();
            $table->string('banner_title')->nullable();
            $table->text('header_custom_code')->nullable();
            $table->text('body_custom_code')->nullable();
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
        Schema::dropIfExists('settings');
    }
}
