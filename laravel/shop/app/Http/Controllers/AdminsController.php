<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Orders;
use App\Models\Products;
use Illuminate\Http\Request;

class AdminsController extends Controller
{
    function list (Request $request)
    {
        $size = 20;

        $catalog = Products::latest('id')
//            ->join('categories', 'products.category', '=', 'categories.id')
            ->paginate($size);

        //получаем категории
        $category = Category::all()->keyBy('id')->toArray();


        return view('admins.list', [
            'catalog'  => $catalog,
            'category' => $category
        ]);

    }

    function edit (Products $product)
    {
        // получаем категории
        $category = Category::all();

        return view('admins.edit', [
            'product' => $product,
            'category' => $category
        ]);

    }
    function save (Products $product, ProductRequest $request)
    {


        if($request->hasFile('image')) {
            $path = $request->file('image')->store('');
            $file = $request->file('image');
            $file->move(public_path() . '/img/cover', $path);
            $product->image = '/img/cover/' . $path;
        }

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category = $request->category;
        $product->save();

        return redirect(route('admins.list'));
    }

    function add ()
    {
        // получаем категории
        $category = Category::all();

        return view('admins.add', [
            'category' => $category
        ]);

    }

    function new (ProductRequest $request)
    {
        $product = new Products();

        if($request->hasFile('image')) {
            $path = $request->file('image')->store('');
            $file = $request->file('image');
            $file->move(public_path() . '/img/cover', $path);
            $product->image = '/img/cover/' . $path;
        }

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category = $request->category;
        $product->save();

        return redirect(route('admins.list'));
    }

    function categoryNew (CategoryRequest $request)
    {
        $product = new Category();

        $product->name = $request->name;
        $product->description = $request->description;
        $product->save();

        return redirect(route('admins.category'));
    }

    function listCategory (Request $request)
    {
        $size = 20;

        $category = Category::latest('id')
//            ->join('categories', 'products.category', '=', 'categories.id')
            ->paginate($size);


        return view('admins.listCategory', [
            'category' => $category
        ]);

    }

    function categoryEdit (Category $category, CategoryRequest $request)
    {
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();

        return redirect(route('admins.category'));
    }

    function delete(Products $product)
    {
        $product->delete();
        return redirect(route('admins.list'));
    }

    function orders()
    {
        $orders = Orders::latest('id')->paginate('10');
        

        return view('admins.orders', [
            'catalog'  => $orders,
        ]);
    }

}
