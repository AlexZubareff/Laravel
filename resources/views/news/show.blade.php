@extends('layouts.main')
@section('header')
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">{{ $news->title }}</h1>
        </div>
    </div>
@endsection
@include('inc.messages')
@section('content')
<div class="news">
    <img src="{{ $news->image }}">
    <br>
    <p>Статус: <em>{{ $news->status }}</em></p>
    <p>Автор: <em>{{ $news->author }}</em></p>
    <p>{!! $news->description !!}</p>

</div>
@endsection
<br><br>

@section('comment')
    <div class="row" >
        <h4>Оставьте свой комментарий</h4>
        <form  method="post" action="{{ route('userComment') }}">
            @csrf
            <div class="form-group">
                <input type="hidden" class="form-control" name="news_id" id="news_id" value="{{ $news->id }} ">
            </div>
            <div class="form-group">
                <label for="name">Имя</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
            </div>
            <br>
            <div class="form-group">
                <label for="description">Комментарий</label>
                <textarea type="text" class="form-control" name="description" id="description">{!! old('description') !!}</textarea>
            </div>
            <br>
            <button type="submit" class="btn btn-success">Добавить комментарий</button>

        </form>
    </div>
@endsection

