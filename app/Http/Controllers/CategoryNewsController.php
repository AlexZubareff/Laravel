<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class CategoryNewsController extends Controller
{
    public function showCategoryList()
    {
        $categoryNews = app(Category::class);
        return view('news.category',[
            'categoryList'=>$categoryNews->getCategories()
        ]);
    }

    public function showCategoryNews(int $id)
    {

        $news = app(News::class);
        $categoryName = app(Category::class);
            return view('news.categoryNews', [
            'categoryNewsList' =>$news->getNewsByCategoryId($id),
            'categoryName'=>$categoryName->getCategoryById($id)
        ]);
    }

}
