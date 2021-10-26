<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompetitorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competitors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('user_id');
            $table->integer('competitior_type');
            $table->integer('competitor_status')->default(0)->comment('0 is pending, 1 is approved, 2 is banned');
            $table->integer('score')->default(0);
            $table->text('description')->nullable();
            $table->text('competition_id');
            $table->text('competition_form')->nullable();
            $table->text('competition_details')->nullable();
            $table->text('performance_link')->nullable();
            $table->text('performance_description')->nullable();
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
        Schema::dropIfExists('competitors');
    }
}
