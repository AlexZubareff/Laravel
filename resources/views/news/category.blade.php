@extends('layouts.main')
@section('title') Список категорий @endsection
@section('header')
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">Список категорий</h1>
        </div>
    </div>
@endsection
@section('content')
    @forelse ($categoryList as $category)
        <div class="category">
            <p><em>{{ $category->id }}</em>.
                <a href="{{ route('categoryNews', $category) }}">{{ $category->title }}</em></a>
            </p>
        </div>
    @empty
        <h2>Категорий нет</h2>
    @endforelse

@endsection














