<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function index()
    {
        $news = app(News::class);

        return view('news.index', [
            'newsList' => $news->getNews()
        ]);
    }

    public function show(int $id)
    {
        $news = app(News::class);
            return view('news.show',[
            'news' => $news->getNewsById($id)
        ]);
    }


}


