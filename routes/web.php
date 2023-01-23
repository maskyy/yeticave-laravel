<?php

use App\Http\Controllers\LotController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
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

Route::get('/', [PageController::class, 'index'])->name('main-page');

Route::get('/lots/{id}', [PageController::class, 'single'])->name('lot-page');

Route::get('/lots/category/{id}', [LotController::class, 'searchByCategory'])->name(('category-search'));

Route::get('/search', [LotController::class, 'search'])->name('search');

Route::get('/sign-up', [PageController::class, 'signup'])->name('signup-page');
Route::post('/sign-up', [UserController::class, 'signup'])->name('signup');
