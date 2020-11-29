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

Auth::routes(['register' => false]);

Route::get('/createsurvey', [App\Http\Controllers\HomeController::class, 'create'])->name('createsurvey');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/answersurvey/{unit}/{uuid}', [App\Http\Controllers\OwnerResponseController::class, 'index']);

Route::get('/mail', [App\Http\Controllers\HomeController::class, 'mail']);
