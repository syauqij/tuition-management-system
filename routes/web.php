<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubjectCategoryController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\UserController;
use App\Models\Course;

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

  Route::get('/courses/{subjectId}/subject', 'listBySubject')->name('subject');
  Route::get('/courses/{course:slug}', 'show')->name('show');

  Route::post('/courses/search', 'search')->name('search');
});

Route::group(['middleware' => 'auth'], function() {
  Route::get('/dashboard', function () {
    return view('dashboard');
  })->name('dashboard');

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
    Route::resource('courses', ResourceController::class)->except([
      'show'
    ]);

    Route::get('/users/{user}', [UserController::class, 'show']);

  });

});


require __DIR__.'/auth.php';

