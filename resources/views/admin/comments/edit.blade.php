@extends('layouts.admin')
@section('title') Редактировать комментарий @endsection
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактировать комментарий - {{ $comment->news->title }}</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
    </div>
    <div class="row">
        @include('inc.messages')
        <form  method="post" action="{{ route('admin.comments.update', ['comment'=>$comment]) }}">
            @csrf
            @method('put')
            <br>
            <br>
            <div class="form-group">
                <label for="name">Автор Комментария</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ $comment->name }}">
            </div>
            <br>
            <div class="form-group">
                <label for="description">Текст комментария</label>
                <textarea type="text" class="form-control" name="description" id="description">{!! $comment->description !!}</textarea>
            </div>
            <br>
            <button type="submit" class="btn btn-success">Сохранить изменения</button>

        </form>
    </div>
@endsection
