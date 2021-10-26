<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJudgeDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('judge_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('user_id');
            $table->text('competition_id');
            $table->text('form_details')->nullable();
            $table->text('submit_details')->nullable();
            $table->date('birth_day')->nullable();
            $table->text('description')->nullable();
            $table->text('status')->nullable();
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
        Schema::dropIfExists('judge_details');
    }
}
