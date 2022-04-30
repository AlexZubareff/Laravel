<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Parser;
use App\Http\Controllers\Controller;
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
        $dataParse = $parser->setUrl(implode($source->only('url')))->getData();
        if($parser->saveParseData($dataParse, $source)){
            return view('admin.sources.parser', [
                'source'=>$source,
                'dataList'=>$dataParse
            ])->with('success', __('messages.admin.news.create.success'));
        }
        return view('admin.sources.parser', [
            'source'=>$source,
            'dataList'=>$dataParse
        ])->with('error', __('messages.admin.news.create.fail'));
//

    }
}
