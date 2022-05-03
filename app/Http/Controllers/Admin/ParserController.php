<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Parser;
use App\Http\Controllers\Controller;
use App\Jobs\NewsParser;
use App\Models\Source;
use Illuminate\Http\Request;



class ParserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param Parser $parser
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function __invoke(Request $request, Parser $parser, Source $source)
    {
        $urls = [
            'https://news.yandex.ru/auto.rss',
            'https://news.yandex.ru/auto_racing.rss',
            'https://news.yandex.ru/army.rss',
            'https://news.yandex.ru/gadgets.rss',
            'https://news.yandex.ru/index.rss',
            'https://news.yandex.ru/martial_arts.rss',
            'https://news.yandex.ru/communal.rss',
            'https://news.yandex.ru/health.rss',
            'https://news.yandex.ru/games.rss',
            'https://news.yandex.ru/internet.rss',
            'https://news.yandex.ru/cyber_sport.rss',
            'https://news.yandex.ru/movies.rss',
            'https://news.yandex.ru/cosmos.rss',
            'https://news.yandex.ru/culture.rss',
            'https://news.yandex.ru/championsleague.rss',
            'https://news.yandex.ru/music.rss',
            'https://news.yandex.ru/nhl.rss',
        ];
        foreach ($urls as $url) {
            $this->dispatch(new NewsParser($url));
        }

        return  response("парсинг стартовал");
//        $dataParse = $parser->setUrl(implode($source->only('url')))->getData();
//        if($parser->saveParseData($dataParse, $source)){
//            return view('admin.sources.parser', [
//                'source'=>$source,
//                'dataList'=>$dataParse
//            ])->with('success', __('messages.admin.news.create.success'));
//        }
//        return view('admin.sources.parser', [
//            'source'=>$source,
//            'dataList'=>$dataParse
//        ])->with('error', __('messages.admin.news.create.fail'));

    }
}
