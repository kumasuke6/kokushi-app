<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->integer('subject_id');
            $table->integer('number');
            $table->text('caption');
            $table->string('caption_img')->nullable();
            $table->string('choice1')->nullable();
            $table->string('choice2')->nullable();
            $table->string('choice3')->nullable();
            $table->string('choice4')->nullable();
            $table->string('choice5')->nullable();
            $table->string('choice_img1')->nullable();
            $table->string('choice_img2')->nullable();
            $table->string('choice_img3')->nullable();
            $table->string('choice_img4')->nullable();
            $table->string('choice_img5')->nullable();
            $table->integer('answer')->nullable();
            $table->text('explan')->nullable();
            $table->string('explan_img')->nullable();
            $table->integer('inappropriate_flg')->default(0);
            $table->timestamps();
            $table->unique(['subject_id', 'number']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
};
