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
        Schema::create('classrooms', function (Blueprint $table) {
          $table->id()->autoIncrement();
          $table->string('name', 120);
          $table->string('room_no', 50);
          $table->foreignId('course_subject_id')->constrained('course_subject');
          $table->foreignId('school_grade_id')->constrained('school_grades');
          $table->foreignId('teacher_user_id')->constrained('users');
          $table->smallInteger('min_students');
          $table->smallInteger('max_students');
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
        Schema::dropIfExists('classrooms');
    }
};
