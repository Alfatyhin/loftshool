<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use App\Models\Orders;
use App\Models\Products;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    function index(Products $product, Request $request)
    {
        session()->push('orders', $product);
        $orders = session('orders');

        // получаем категории
        $category = Category::all();

        // случайный товар
        $randomProduct = Products::inRandomOrder()->first();

        $randomNews = News::inRandomOrder()->take(3)->get();

        if ($request->user()->email) {
            $userMail = $request->user()->email;
        } else {
            $userMail = '';
        }


        return view('catalog.basket', [
            'content' => $orders,
            'category' => $category,
            'randomNews' => $randomNews,
            'randomProduct' => $randomProduct,
            'userMail' => $userMail
        ]);
    }


}
