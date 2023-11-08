<?php

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

use App\Http\Controllers\Admin\ProfileController;
// Route::controller(ProfileController::class)->prefix('admin')->group(function() {
//     Route::get('profile/view', 'view');
// });
// ↑↑↑書き換えられる↓↓↓
Route::get('/admin/profile/view', [ProfileController::class, 'view']);
Route::get('/', [ProfileController::class, 'view'])->name('top');


use App\Http\Controllers\Admin\NewarticleController;
Route::controller(NewarticleController::class)->prefix('admin')->group(function() {
    Route::get('newarticle/insert', 'add');
});

use App\Http\Controllers\Admin\BlogController;
Route::controller(BlogController::class)->prefix('admin')->group(function() {
    Route::get('blog/insert', 'add')->name('kaze');
});

use App\Http\Controllers\Admin\FormController;
Route::controller(FormController::class)->prefix('admin')->group(function() {
    Route::get('form/create', 'add');
});