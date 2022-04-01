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
        $categoryNews = $this->getNews();
        $categoryNameArray = $this->getCategoryNews();

        $categoryName = $categoryNameArray[array_search($categoryId,$categoryNameArray)]['categoryName'];

        $categoryNewsArray = [];
        foreach ($categoryNews as $item){
            if ($item['categoryId'] == $categoryId) {
                $categoryNewsArray[] = $item;
            }
        }
            return view('news.categoryNews', [
            'categoryNewsList' =>$categoryNewsArray,
            'categoryName'=>$categoryName
        ]);
    }

}
