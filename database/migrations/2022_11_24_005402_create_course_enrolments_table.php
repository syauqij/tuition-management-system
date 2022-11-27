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
        Schema::create('course_enrolments', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->foreignId('course_id')->constrained('courses');
            $table->foreignId('user_id')->constrained('users');
            $table->enum('status', ['new', 'pending', 'active', 'inactive', 'rejected']);
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
        Schema::dropIfExists('course_enrolments');
    }
};
