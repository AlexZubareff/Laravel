<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryNewsController extends Controller
{
    public function showCategoryList()
    {
        $categoryNews = $this->getCategoryNews();
        return view('news.category',[
            'categoryList'=>$categoryNews
        ]);
    }

    public function showCategoryNews(int $categoryId)
    {
        return view('news.categoryNews', [
            'news' => $this->getNews($categoryId)
        ]);
    }

}
