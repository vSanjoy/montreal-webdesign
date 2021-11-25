<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebsiteSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('website_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('from_email')->nullable();
            $table->string('to_email')->nullable();
            $table->text('website_title')->nullable();
            $table->string('phone_no')->nullable();
            $table->string('fax')->nullable();
            $table->string('facebook_link')->nullable();
            $table->string('twitter_link')->nullable();
            $table->string('instagram_link')->nullable();
            $table->string('linkedin_link')->nullable();
            $table->string('pinterest_link')->nullable();
            $table->string('googleplus_link')->nullable();
            $table->string('youtube_link')->nullable();
            $table->string('rss_link')->nullable();
            $table->string('dribble_link')->nullable();
            $table->string('tumblr_link')->nullable();
            $table->text('address')->nullable();
            $table->longText('map')->nullable();
            $table->text('footer_address')->nullable();
            $table->text('copyright_text')->nullable();
            $table->text('tag_line')->nullable();
            $table->string('toll_free')->nullable();
            $table->string('logo')->nullable();
            $table->string('footer_logo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('website_settings');
    }
}
