<?php

use App\Http\Controllers\BetController;
use App\Http\Controllers\FavoriteController;
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
Route::delete('/lots/{id}', [LotController::class, 'removeLot'])->name('delete-lot')->middleware('customAuth');

Route::get('/lots/category/{id}', [LotController::class, 'searchByCategory'])->name(('category-search'));

Route::get('/search', [LotController::class, 'search'])->name('search');

Route::get('/sign-up', [PageController::class, 'signup'])->name('signup-page');
Route::post('/sign-up', [UserController::class, 'signup'])->name('signup');

Route::get('/login', [PageController::class, 'login'])->name('login-page');
Route::post('/login',[UserController::class, 'login'])->name('login');

Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/403', [PageController::class, 'error403'])->name('403');

Route::get('/add-lot', [PageController::class, 'addLot'])->name('add-lot-page')->middleware('customAuth');
Route::post('/add-lot', [LotController::class, 'addLot'])->name('add-lot')->middleware('customAuth');

Route::resource('bets', BetController::class)->only([
    'index', 'store', 'destroy'
])->middleware('customAuth');

Route::resource('favorites', FavoriteController::class)->only([
    'index', 'store', 'destroy'
])->middleware('customAuth');
