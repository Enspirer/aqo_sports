<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJudgmentMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('judgment_marks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('competitor_id');
            $table->text('competition_id');
            $table->text('score');
            $table->text('judge_score');
            $table->text('competitor_all_score');
            $table->text('judge_score_details');
            $table->text('competitor_all_score_details');
            $table->text('performance_id')->nullable();
            $table->text('round_name');
            $table->text('judge_id');
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
        Schema::dropIfExists('judgment_marks');
    }
}
