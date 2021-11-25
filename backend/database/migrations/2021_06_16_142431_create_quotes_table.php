<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('business_name')->nullable();
            $table->string('how_many_employees')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('email')->nullable();
            $table->string('city')->nullable();
            $table->string('hear_about_us')->nullable();
            $table->text('website_description')->nullable();
            $table->enum('static_website_html_non_flash', ['N','Y'])->default('N')->comment('N=>No, Y=>Yes');
            $table->enum('dynamic_website_flash_website_animated', ['N','Y'])->default('N')->comment('N=>No, Y=>Yes');
            $table->enum('static_website_with_flash_intro', ['N','Y'])->default('N')->comment('N=>No, Y=>Yes');
            $table->enum('logo_creation', ['N','Y'])->default('N')->comment('N=>No, Y=>Yes');
            $table->enum('domain_name_registration', ['N','Y'])->default('N')->comment('N=>No, Y=>Yes');
            $table->enum('website_maintenance', ['N','Y'])->default('N')->comment('N=>No, Y=>Yes');
            $table->enum('website_hosting', ['N','Y'])->default('N')->comment('N=>No, Y=>Yes');
            $table->enum('search_engine_submission', ['N','Y'])->default('N')->comment('N=>No, Y=>Yes');
            $table->enum('english_language_website', ['N','Y'])->default('N')->comment('N=>No, Y=>Yes');
            $table->enum('french_language_website', ['N','Y'])->default('N')->comment('N=>No, Y=>Yes');
            $table->enum('bilingual_language_website', ['N','Y'])->default('N')->comment('N=>No, Y=>Yes');
            $table->string('number_of_english_pages')->nullable();
            $table->string('number_of_english_graphics')->nullable();
            $table->string('number_of_french_pages')->nullable();
            $table->string('number_of_french_graphics')->nullable();
            $table->string('day')->nullable();
            $table->string('month')->nullable();
            $table->string('year')->nullable();
            $table->string('budget')->nullable();
            $table->enum('status', ['0','1'])->default('1')->comment('0=>Inactive, 1=>Active');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('NULL ON UPDATE CURRENT_TIMESTAMP'))->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quotes');
    }
}
