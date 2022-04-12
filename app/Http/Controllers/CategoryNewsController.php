<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class CategoryNewsController extends Controller
{
    public function showCategoryList()
    {
/*        $categoryNews = app(Category::class);*/
        return view('news.category',[
            'categoryList'=>Category::all()
        ]);
    }

    public function showCategoryNews(int $id)
    {

/*        $news = app(News::class);
        $categoryName = app(Category::class);*/
            return view('news.categoryNews', [
            'categoryNewsList' =>Category::find($id)->news,
            'categoryName'=>Category::find($id)

        ]);
    }

}
