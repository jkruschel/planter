<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\displayItemController;
use App\Http\Controllers\fileController;

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

Route::get('/', [displayItemController::class, 'index']);

Route::get('/displayItem/{id}', [displayItemController::class, 'displayItem'])->name('displayItem');

Route::post('/createKommentar/{id}', [displayItemController::class, 'createKommentar'])->name('createKommentar');

Route::get('/markWinner/{id}', [displayItemController::class, 'markWinner'])->name('markWinner');

Route::post('/deleteItem/{id}', [fileController::class, 'deleteItem'])->name('deleteItem');

Route::get('/createItem', function () {
    return view('createItem');
})->name('createItem');

Route::post('/saveItem', [fileController::class, 'saveItem'])->name('saveItem');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/loginPage', [App\Http\Controllers\displayItemController::class, 'loginPage'])->name('loginPage');

Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');