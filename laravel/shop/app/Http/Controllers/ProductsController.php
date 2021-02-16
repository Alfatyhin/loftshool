<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    function index(Request $request)
    {
        $size = 6;
        $categoryName = 'All';
        $pageStart = 1;
        $categoryId = 0;

        if($request->categoryId) {
            $categoryId = (int) $request->categoryId;
        }

        if ($categoryId == 0) {
            // получаем выборку товаров
            $catalog = Products::latest('id')->paginate($size);

        } else {
            $categoryName = $request->categoryName;

            $catalog = Products::where('category', '=', $categoryId)->paginate($size);
        }


        if($catalog->currentPage() > 3) {
            $pageStart = $catalog->currentPage() -2;
        }
        $pageEnd = $pageStart + 4;
        if ($pageEnd >= $catalog->lastPage()) {
            $pageEnd = $catalog->lastPage();
        }

        // получаем категории
        $category = Category::all();
        // случайный товар
        $randomProduct = Products::inRandomOrder()->first();

        return view('catalog.index', [
            'catalog' => $catalog,
            'category' => $category,
            'pageStart' => $pageStart,
            'pageActiv' => $catalog->currentPage(),
            'pageEnd'   => $pageEnd,
            'pageNext' => $catalog->currentPage() + 1,
            'randomProduct' => $randomProduct,
            'categoryId' => $categoryId,
            'categoryName' => $categoryName
        ]);
    }

    function single(Products $product)
    {
        $categoryId = (int) $product->category;
        // получаем категорию
        $categoryOnce = Category::where('id', '=', $categoryId)->first();

        // три товара внизу ну пусть будут случайные из этогой же категории
        $catalog = Products::where('category', '=', $categoryId)->inRandomOrder()->take(3)->get();

        // случайный товар
        $randomProduct = Products::inRandomOrder()->first();

        // получаем категории
        $category = Category::all();

        return view('catalog.single', [
            'product' => $product,
            'category' => $category,
            'catalog' => $catalog,
            'categoryId' => $categoryId,
            'categoryName' => $categoryOnce->name,
            'randomProduct' => $randomProduct,
            'action' => 'single'
        ]);
    }


}
