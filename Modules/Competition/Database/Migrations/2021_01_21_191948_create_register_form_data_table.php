<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegisterFormDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('register_form_data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('input_type');
            $table->text('name');
            $table->text('element_id');
            $table->text('is_required')->nullable();
            $table->text('plalce_holder')->nullable();
            $table->text('value')->nullable();
            $table->text('label')->nullable();
            $table->text('javascript')->nullable();
            $table->text('max')->nullable();
            $table->text('min')->nullable();
            $table->text('class')->nullable();
            $table->text('inline_style')->nullable();
            $table->text('options')->nullable();
            $table->text('element_type')->nullable();
            $table->integer('competion_id');
            $table->text('description')->nullable();

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
        Schema::dropIfExists('register_form_data');
    }
}
