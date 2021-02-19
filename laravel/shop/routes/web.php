<?php

use App\Http\Controllers\AdminsController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProductsController;
use App\Http\Middleware\AdminGroup;
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
// роуты для каталога
Route::get('/', [ProductsController::class, 'index'])
    ->name('index');
Route::post('/search', [ProductsController::class, 'search'])
    ->name('search');
Route::get('/category/{categoryName}', [ProductsController::class, 'index'])
    ->name('category.list');
Route::get('/single/{product}', [ProductsController::class, 'single'])
    ->name('single.view');
Route::get('/aboot', [ProductsController::class, 'about'])
    ->name('about');


// роуты для новостей
Route::get('/news', [NewsController::class, 'index'])
    ->name('news.index');
Route::get('/news/{news}', [NewsController::class, 'once'])
    ->name('news.once');

// роуты для корзины
Route::get('/basket/{product}', [BasketController::class, 'index'])
    ->name('basket.index');
Route::get('/basket', [BasketController::class, 'index'])
    ->name('basket.list');

Route::post('/orders/save', [OrdersController::class, 'orderSave'])
    ->name('order.save');

Route::get('/request/', [OrdersController::class, 'request'])
    ->name('order.request');



// роуты для админа, пока закрыты только авторизацией
Route::group(array('prefix' => 'admins', 'middleware' => AdminGroup::class), function () {
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

    Route::get('/delete/{product}', [AdminsController::class, 'delete'])
        ->name('admins.delete');

    Route::get('/category', [AdminsController::class, 'listCategory'])
        ->name('admins.category');

    Route::post('/category/new', [AdminsController::class, 'categoryNew'])
        ->name('admins.categoryNew');

    Route::post('/category/edit/{category}', [AdminsController::class, 'categoryEdit'])
        ->name('admins.categoryEdit');


    Route::get('/orders', [AdminsController::class, 'orders'])
        ->name('admins.orders');

    Route::get('/users', [AdminsController::class, 'users'])
        ->name('admins.users');
    Route::get('/users/add/{user}', [AdminsController::class, 'adminAdd'])
        ->name('admins.role.add');
    Route::get('/users/delete/{user}', [AdminsController::class, 'adminDlete'])
        ->name('admins.role.delete');
});


// сделан редирект на главную
Route::get('/dashboard', function () {
    //return view('dashboard');
    return redirect(route('index'));
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
