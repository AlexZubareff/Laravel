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

        return view('news.index', [
            'newsList' => News::paginate(6)
        ]);
    }


    public function show(News $news)
    {
            return view('news.show',[
            'news' => $news
        ]);
    }


}


