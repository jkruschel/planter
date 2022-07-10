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

Route::get('/displayItem', [displayItemController::class, 'displayItem'])->name('displayItem');

Route::get('/createItem', function () {
    return view('createItem');
});

Route::post('/saveItem', [displayItemController::class, 'saveItem'])->name('saveItem');