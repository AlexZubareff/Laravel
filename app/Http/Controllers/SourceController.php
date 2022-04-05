<?php

namespace App\Http\Controllers;

use App\Models\Source;
use Illuminate\Http\Request;

class SourceController extends Controller
{
    public function index()
    {
        $source = app(Source::class);

        return view('sources.index', [
            'sourceList' => $source->getSources()
        ]);
    }
}
