<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\displayItemController;

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

Route::post('/displayItem/{id}', [displayItemController::class, 'displayItem'])->name('displayItem');

Route::get('/createItem', function () {
    return view('createItem');
})->name('createItem');

Route::post('/saveItem', [displayItemController::class, 'saveItem'])->name('saveItem');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/loginPage', [App\Http\Controllers\displayItemController::class, 'loginPage'])->name('loginPage');

