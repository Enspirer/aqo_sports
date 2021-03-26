<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompetitionCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competition_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('category_name');
            $table->text('description')->nullable();
            $table->text('feature_image')->nullable();
            $table->text('vote_function')->nullable();
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
        Schema::dropIfExists('competition_categories');
    }
}
