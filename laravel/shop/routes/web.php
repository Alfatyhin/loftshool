<?php

use App\Http\Controllers\AdminsController;
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

Route::get('/laravel', function () {
    return view('welcome');
});

Route::get('/', [ProductsController::class, 'index'])
    ->name('index');
Route::get('/category/{categoryName}', [ProductsController::class, 'index'])
    ->name('category.list');
Route::get('/single/{product}', [ProductsController::class, 'single'])
    ->name('single.view');

Route::group(['prefix' => 'admins', 'middleware' => 'auth'], function () {
    Route::get('/', [AdminsController::class, 'list'])
        ->name('admins.list');
    Route::get('/edit/{product}', [AdminsController::class, 'edit'])
        ->name('admins.edit');
    Route::post('/save/{product}', [AdminsController::class, 'save'])
        ->name('admins.save');
    Route::post('/new', [AdminsController::class, 'new'])
        ->name('admins.new');
    Route::get('/add', [AdminsController::class, 'add'])
        ->name('admins.add');
    Route::get('/category', [AdminsController::class, 'listCategory'])
        ->name('admins.category');
    Route::post('/category/new', [AdminsController::class, 'categoryNew'])
        ->name('admins.categoryNew');
    Route::post('/category/edit/{category}', [AdminsController::class, 'categoryEdit'])
        ->name('admins.categoryEdit');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
