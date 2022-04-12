<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;


class CommentController extends Controller
{
    // сюда доб код для сохранения в базе коммента
    public function addComment(Request $request)
    {
            $comment = Comment::create($request->only(['news_id','name', 'description']));

            if ($comment) {
                return back()->with('success', 'Комментарий успешно добавлен');
            }
            return back()->with('error', 'Не удалось добавить комментарий');

    }

/*    public function downloadComment(Response $response)
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
    }*/

}


