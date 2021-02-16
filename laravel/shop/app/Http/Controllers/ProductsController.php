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

        $pageStart = 1;
        $pageActiv = 1;
        $pageEnd = 5;

        $categoryId = 0;

        $categoryName = 'All';

        if($request->categoryId) {
            $categoryId = (int) $request->categoryId;
        }
        if($request->pageNum) {
            $pageActiv = (int) $request->pageNum;
        }
        $pageNext = $pageActiv + 1;
        $skip = ($pageActiv - 1) * $size;

        if ($categoryId == 0) {
            // получаем выборку товаров
            $catalog = Products::latest('id')->skip($skip)->take($size)->get();

        } else {
            $categoryName = $request->categoryName;

            $catalog = Products::where('category', '=', $categoryId)
                ->latest('id')
                ->skip($skip)
                ->take($size)
                ->get();
        }

        // получаем категории
        $category = Category::all();
        // случайный товар
        $randomProduct = Products::inRandomOrder()->first();

        return view('catalog.index', [
            'catalog' => $catalog,
            'category' => $category,
            'pageStart' => $pageStart,
            'pageActiv' => $pageActiv,
            'pageEnd'   => $pageEnd,
            'pageNext' => $pageNext,
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
            'categoryName' => $categoryOnce->name,
            'randomProduct' => $randomProduct
        ]);
    }


}
