<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('judge_id');
            $table->integer('user_id');
            $table->text('comment')->nullable();
            $table->integer('is_liked')->default(0)->comment('0 unvote 1 vote');
            $table->text('review')->nullable();
            $table->integer('profemance_id');
            $table->integer('competition_id');

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
        Schema::dropIfExists('votes');
    }
}
