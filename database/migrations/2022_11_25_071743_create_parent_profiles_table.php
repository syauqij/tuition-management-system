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
        Schema::create('parent_profiles', function (Blueprint $table) {
          $table->id()->autoIncrement();
          $table->string('first_name');
          $table->string('last_name');
          $table->string('email')->unique();
          $table->string('phone_no', 15);
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
        Schema::dropIfExists('parent_profiles');
    }
};
