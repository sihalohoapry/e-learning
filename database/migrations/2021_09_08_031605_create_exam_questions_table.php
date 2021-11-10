<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_questions', function (Blueprint $table) {
            $table->id();

            $table->integer('exams_id')->nullable();
            $table->integer('users_id')->nullable();
            $table->string('teacher_name');
            $table->string('class_name');
            $table->string('question')->nullable();
            $table->string('multiple_choice_one')->nullable();
            $table->string('multiple_choice_two')->nullable();
            $table->string('multiple_choice_three')->nullable();
            $table->string('multiple_choice_four')->nullable();
            $table->string('answer')->nullable();

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
        Schema::dropIfExists('exam_questions');
    }
}
