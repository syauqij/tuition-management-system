<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up()
  {
      Schema::table('staff_profiles', function (Blueprint $table) {
          $table->string('street_2')->nullable()->change();
      });
  }

  public function down()
  {
      Schema::table('staff_profiles', function (Blueprint $table) {
          $table->string('street_2')->nullable(false)->change();
      });
  }
};
