<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    function index()
    {
        $size = 6;

        $pageStart = 1;
        $pageActiv = 1;
        $pageEnd = 5;

        if (!empty( $_GET['page'])) {
            $pageActiv = (int) $_GET['page'];
            $pageStart = (int) $_GET['pageStart'];
            $pageEnd = $pageStart + 4;
        }

        // можно было бы обойтись листанием по страницам
        // но мне понравилась идея возможпоти листать блоками
        if (!empty( $_GET['pageNext'])) {

            $pageStart = (int) $_GET['pageNext'];
            if ($pageStart < 1) {
                $pageStart = 1;
            }
            $pageActiv = $pageStart;
            $pageEnd = $pageStart + 4;
        }

        $skip = ($pageActiv - 1) * $size;

        $categoryId = 0;

        if (isset($_GET['catId'])) {
            $categoryId = (int) $_GET['catId'];
        }

        if ($categoryId == 0) {
            // получаем выборку товаров
            $catalog = Products::latest('id')->skip($skip)->take($size)->get();

        } else {
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
            'randomProduct' => $randomProduct,
            'categoryId' => $categoryId
        ]);
    }

    function single()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        } else {
            $id = 1;
        }
        // получаем один товар
        $product = Products::where('id', '=', $id)->first();

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
