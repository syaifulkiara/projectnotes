<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\UserController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes(['verify' => true]);
Route::group(['middleware' => 'auth'], function () {
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/projects/my_project', [App\Http\Controllers\ProjectController::class, 'my_project'])->name('project.my_project');
Route::get('/projects/done', [App\Http\Controllers\ProjectController::class, 'done'])->name('project.done');
Route::get('/projects/progress', [App\Http\Controllers\ProjectController::class, 'progress'])->name('project.progress');
Route::get('/projects/feedback', [App\Http\Controllers\ProjectController::class, 'feedback'])->name('project.feedback');
Route::get('/projects/rejected', [App\Http\Controllers\ProjectController::class, 'rejected'])->name('project.rejected');
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile.index');
Route::get('/profile/changepassword', [App\Http\Controllers\ProfileController::class, 'changepassword'])->name('profile.changepassword');
Route::get('/profile/{id}/edit', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
Route::post('/profile/{id}/update', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
Route::resource('projects', ProjectController::class);
Route::resource('activity', ActivityController::class);
Route::resource('users', UserController::class);
});
