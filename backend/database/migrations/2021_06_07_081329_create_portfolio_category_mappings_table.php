<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortfolioCategoryMappingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portfolio_category_mappings', function (Blueprint $table) {
            $table->id();
            $table->integer('portfolio_id')->nullable()->comment('Id from portfolios table');
            $table->integer('category_id')->nullable()->comment('Id from categories table');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('portfolio_category_mappings');
    }
}
