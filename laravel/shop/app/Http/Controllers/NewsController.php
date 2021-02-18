<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use App\Models\Products;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    function index(Request $request)
    {
        $size = 2;
        $categoryName = 'All';
        $pageStart = 1;
        $categoryId = 0;

        if($request->categoryId) {
            $categoryId = (int) $request->categoryId;
        }

        if ($categoryId == 0) {
            // получаем выборку товаров
            $news = News::latest('id')->paginate($size);

        } else {
            $categoryName = $request->categoryName;

            $news = News::where('category', '=', $categoryId)->paginate($size);
        }


        if($news->currentPage() > 3) {
            $pageStart = $news->currentPage() -2;
        }
        $pageEnd = $pageStart + 4;
        if ($pageEnd >= $news->lastPage()) {
            $pageEnd = $news->lastPage();
        }

        // получаем категории
        $category = Category::all();
        // случайный товар
        $randomProduct = Products::inRandomOrder()->first();

        return view('news.index', [
            'content' => $news,
            'category' => $category,
            'pageStart' => $pageStart,
            'pageActiv' => $news->currentPage(),
            'pageEnd'   => $pageEnd,
            'pageNext' => $news->currentPage() + 1,
            'randomProduct' => $randomProduct,
            'categoryId' => $categoryId,
            'categoryName' => $categoryName
        ]);

    }

    function once(News $news)
    {
        // получаем категории
        $category = Category::all();

        // три товара внизу ну пусть будут случайные из этогой же категории
        $catalog = Products::inRandomOrder()->take(3)->get();

        // случайный товар
        $randomProduct = Products::inRandomOrder()->first();

        return view('news.once', [
            'content' => $news,
            'category' => $category,
            'catalog' => $catalog,
            'randomProduct' => $randomProduct,
        ]);

    }
}
