<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompetitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competitions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('competition_name');
            $table->text('description');
            $table->integer('is_feature')->default(0);
            $table->text('feature_image')->nullable();
            $table->integer('user_id');
            $table->integer('category_id');
            $table->integer('payment_type')->default(1)->comment('1 is free, 2 paid');
            $table->integer('status')->default(0)->comment('active,deactive status');
            $table->date('started_date')->comment('coundown_started_date');
            $table->date('end_date')->comment('coundown_end_date');
            $table->text('register_form')->comment('register_form_details');
            $table->text('game_rules')->comment('register_form_details');
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
        Schema::dropIfExists('competitions');
    }
}
