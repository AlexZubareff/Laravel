@extends('layouts.main')
@section('header')
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">{{$categoryName}}</h1>
        </div>
    </div>
@endsection

@section('content')
    @forelse($categoryNewsList as $list)
    <div class="news">
        <p>Название: <em>{{ $list['title'] }}</em></p>
        <img src="{{ $list['image'] }}">
        <br>
        <p>Статус: <em>{{ $list['status'] }}</em></p>
        <p>Автор: <em>{{ $list['author'] }}</em></p>
        <p>{!! $list['description'] !!}</p>
        <p>Категория: <em>{{ $list['categoryId'] }}</em></p>
    </div>
    @empty
        Новостей в данной категории нет
    @endforelse
@endsection






