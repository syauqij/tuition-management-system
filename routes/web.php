<?php

use App\Http\Controllers\SubjectCategoryController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
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
  });
});

require __DIR__.'/auth.php';

