<?php

use App\Http\Controllers\ProductsController;
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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [ProductsController::class, 'index'])
    ->name('index');
Route::get('/{categoryName}', [ProductsController::class, 'index'])
    ->name('category.list');
Route::get('/single/{product}', [ProductsController::class, 'single'])
    ->name('single.view');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/single/edit/{product}', [ProductsController::class, 'edit'])
        ->name('single.edit');
    Route::get('/single/add', [ProductsController::class, 'add'])
        ->name('single.add');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
