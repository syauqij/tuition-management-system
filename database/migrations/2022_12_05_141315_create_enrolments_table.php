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
        Schema::create('enrolments', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->foreignId('student_user_id')->constrained('users');
            $table->json('student_profile');
            $table->json('parent_profile');
            $table->foreignId('course_id')->constrained('courses');
            $table->foreignId('subject_category_id')->constrained('subject_categories');
            $table->foreignId('subject_id')->constrained('subjects');
            $table->enum('status', ['applied', 'rejected', 'accepted']);
            $table->foreignId('updated_by')->nullable()->constrained('users')->references('id');
            $table->string('remarks')->nullable();
            $table->timestamps();
        });

        Schema::dropIfExists('course_enrolments');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enrolments');
    }
};
