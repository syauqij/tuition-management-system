<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubjectCategoryController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\EnrolmentController;
use App\Http\Controllers\ClassroomController;

/*
|-------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'home.welcome')->name('home');
Route::view('/about', 'home.about')->name('about');
Route::view('/pricing', 'home.pricing')->name('pricing');
Route::view('/contact', 'home.contact')->name('contact');


Route::controller(CourseController::class)->name('courses.')->group(function () {
  Route::get('/courses', 'list')->name('list');
  Route::get('/courses/list/{id}/{type}/{name}', 'list')
    ->where('name', '(.*)')
    ->name('filter');
  Route::get('/courses/view/{id}/{slug?}', 'show')->name('show');
  Route::get('/courses/search', 'search')->name('search');
});

Route::group(['middleware' => 'auth'], function() {
  Route::get('/dashboard', function () {
    return view('dashboard');
  })->name('dashboard');

  Route::get('/enrolments/status/{id}/{status}', [EnrolmentController::class, 'status'])->name('enrolments.status');
  Route::resource('enrolments', EnrolmentController::class);

  Route::resource('classrooms', ClassroomController::class);

  Route::get('profile', [UserProfileController::class, 'show'])
    ->name('profile');
  Route::put('profile', [UserProfileController::class, 'update'])
    ->name('profile.update');

  Route::prefix('/settings')->group(function () {
    Route::get('/', function () {
      return view('settings');
    })->name('settings');

    Route::resource('subject-categories', SubjectCategoryController::class);
    Route::resource('subjects', SubjectController::class);
    Route::resource('courses', CourseController::class)->except([
      'show'
    ]);
  });

});


require __DIR__.'/auth.php';

