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
        Schema::table('enrolments', function (Blueprint $table) {
          $table->dropForeign('enrolments_subject_category_id_foreign');
          $table->dropForeign('enrolments_subject_id_foreign');
          $table->dropColumn(['subject_category_id','subject_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('enrolments', function (Blueprint $table) {
          $table->unsignedBigInteger('subject_category_id')->nullable()->after('course_id');
          $table->unsignedBigInteger('subject_id')->nullable()->after('subject_category_id');

          $table->foreign('subject_category_id')->references('id')->on('subject_categories');
          $table->foreign('subject_id')->references('id')->on('subjects');
        });
    }
};
