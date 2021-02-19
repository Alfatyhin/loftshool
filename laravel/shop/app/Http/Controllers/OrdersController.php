<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Mail\newOrder;
use App\Models\Category;
use App\Models\News;
use App\Models\Orders;
use App\Models\Products;
use Illuminate\Http\Request;
use Mail;

class OrdersController extends Controller
{
    function orderSave(OrderRequest $request)
    {
        $order = new Orders();

        $orders = session('orders');

        if (empty($orders)) {
            session()->flash('message', 'Корзина пуста');
            return redirect(route('order.request'));
        }

        foreach ($orders as $item) {
            $ordersid[] = $item->id;
            $ordersItem[$item->id]['name'] = $item->name;
            $ordersItem[$item->id]['image'] = $item->image;
            $ordersItem[$item->id]['description'] = $item->description;
            $ordersItem[$item->id]['price'] = $item->price;
        }

        $order->order_id = json_encode($ordersid);
        $order->orders = json_encode($ordersItem);
        $order->name = $request->name;
        $order->email = $request->email;
        $order->status = 'in processing';
        $order->note = 'новый заказ';
        //$order->save();

        // очищаем сессию
        session()->forget('orders');

        session()->flash('message', 'Ваш заказ принят, Спасибо.');

        // переменные письма заказчику
        $data['name'] = $request->name;
        $data['order'] = $ordersItem;

        // отправляем письмо
        Mail::to(\Auth::user())->send(new newOrder(['order' => $data] ));

        return redirect(route('order.request'));

    }

    function request(Request $request) {
        $message = $value = session('message');
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
