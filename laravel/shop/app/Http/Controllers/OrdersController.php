<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Category;
use App\Models\News;
use App\Models\Orders;
use App\Models\Products;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    function orderSave(OrderRequest $request)
    {
        $order = new Orders();

        $orders = session('orders');

        foreach ($orders as $item) {
            $ordersid[] = $item->id;
        }

        $order->order_id = json_encode($ordersid);;
        $order->name = $request->name;
        $order->email = $request->email;
        $order->status = 'in processing';
        $order->note = 'новый заказ';
        $order->save();

        // очищаем сессию
        session()->forget('orders');

       return redirect(route('order.thankyou', ['message' => 'Ваш заказ принят, Спасибо.']));

    }

    function thankYou(Request $request) {
        $message = $request->message;
        // получаем категории
        $category = Category::all();

        // случайный товар
        $randomProduct = Products::inRandomOrder()->first();

        $randomNews = News::inRandomOrder()->take(3)->get();

        return view('sitemessage', [
            'message' => $message,
            'category' => $category,
            'randomNews' => $randomNews,
            'randomProduct' => $randomProduct,
        ]);
    }
}
