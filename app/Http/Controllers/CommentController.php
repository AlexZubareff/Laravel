<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;


class CommentController extends Controller
{
    public function addComment(Request $request)
    {
        Storage::disk('local')->put('data.txt', 'Имя пользователя: ' . $request->input('name'));
        Storage::disk('local')->append('data.txt', 'Коментарий: ' . $request->input('comment'));
        return view('news.userComment', ['name'=>$request->input('name'), 'comment'=>$request->input('comment')]);
    }

    public function downloadComment(Response $response)
    {
        return response()->download('/storage/app/data.txt');
    }

    public function storeComment(Request $request)
    {
        $request->validate([
            'name'=>['required', 'string']
        ]);

        return response()->json(
            $request->only('name', 'comment'), 201
        );
    }

}


