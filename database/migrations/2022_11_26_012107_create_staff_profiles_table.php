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
        Schema::create('staff_profiles', function (Blueprint $table) {
          $table->id()->autoIncrement();
          $table->foreignId('user_id')->constrained('users');
          $table->bigInteger('mykad');
          $table->enum('gender', ['male', 'female']);
          $table->date('birthdate');
          $table->string('street_1');
          $table->string('street_2');
          $table->mediumInteger('postcode');
          $table->string('city');
          $table->string('state');
          $table->string('country');
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
        Schema::dropIfExists('staff_profiles');
    }
};
