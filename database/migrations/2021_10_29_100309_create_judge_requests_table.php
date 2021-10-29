<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJudgeRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('judge_requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('user_id');
            $table->text('judge_name');
            $table->text('institute')->nullable();
            $table->text('introduction')->nullable();
            $table->text('skills');
            $table->text('id_card')->nullable();
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
        Schema::dropIfExists('judge_requests');
    }
}
