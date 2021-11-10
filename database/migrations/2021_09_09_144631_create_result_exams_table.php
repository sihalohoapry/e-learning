<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('result_exams', function (Blueprint $table) {
            $table->id();
            $table->integer('users_id');
            $table->string('teacher_name');
            $table->string('class_name');
            $table->integer('exams_id');
            $table->string('exam_name');
            $table->integer('result')->default(0);
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
        Schema::dropIfExists('result_exams');
    }
}
