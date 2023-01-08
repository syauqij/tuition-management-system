<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Subject Categories Default Data

        DB::table('subject_categories')->insert([
          'name' => 'Standard 1 - 6 (UPSR)',
          'created_at' => Carbon::now(),
        ]);

        DB::table('subject_categories')->insert([
          'name' => 'Form 1 - 3 (PT3)',
          'created_at' => Carbon::now(),
        ]);

        DB::table('subject_categories')->insert([
          'name' => 'Form 4 - 5 (SPM) / O-Level',
          'created_at' => Carbon::now(),
        ]);

        DB::table('subject_categories')->insert([
          'name' => 'Form 6 / Pre-U (STPM) / A-Level',
          'created_at' => Carbon::now(),
        ]);

        DB::table('subject_categories')->insert([
          'name' => 'Nursery/Kindergarten',
          'created_at' => Carbon::now(),
        ]);

        DB::table('subject_categories')->insert([
          'name' => 'Computer Subjects',
          'created_at' => Carbon::now(),
        ]);

        DB::table('subject_categories')->insert([
          'name' => 'Music Classes',
          'created_at' => Carbon::now(),
        ]);

        // Subjects Default Data
        DB::table('subjects')->insert([
          'name' => 'English',
          'created_at' => Carbon::now(),
        ]);

        DB::table('subjects')->insert([
          'name' => 'Bahasa Melayu',
          'created_at' => Carbon::now(),
        ]);

        DB::table('subjects')->insert([
          'name' => 'Mathematics',
          'created_at' => Carbon::now(),
        ]);

        DB::table('subjects')->insert([
          'name' => 'Science',
          'created_at' => Carbon::now(),
        ]);

        DB::table('subjects')->insert([
          'name' => 'Physics',
          'created_at' => Carbon::now(),
        ]);

        DB::table('subjects')->insert([
          'name' => 'Programming',
          'created_at' => Carbon::now(),
        ]);

        $description = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
          Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
          Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
          Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";

        // Courses Default Data
        DB::table('courses')->insert([
          'name' => 'Primary School Mathematics Class',
          'description' => $description,
          'type' => 'class',
          'subject_category_id' => 1,
          'created_at' => Carbon::now(),
        ]);

        DB::table('courses')->insert([
          'name' => 'Primary School English Class',
          'description' => $description,
          'type' => 'class',
          'subject_category_id' => 1,
          'created_at' => Carbon::now(),
        ]);

        DB::table('courses')->insert([
          'name' => 'Basic PHP Programming Class',
          'description' => $description,
          'type' => 'online',
          'subject_category_id' => 6,
          'created_at' => Carbon::now(),
        ]);

        DB::table('courses')->insert([
          'name' => 'Kindergarten Core Subjects Session',
          'description' => $description,
          'type' => 'home',
          'subject_category_id' => 5,
          'created_at' => Carbon::now(),
        ]);
    }
}
