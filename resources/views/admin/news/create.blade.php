@extends('layouts.admin')
@section('title') Добавить новость @endsection
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Добавить новость</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
    </div>
    <div class="row">
@include('inc.messages')
        <form  method="post" action="{{ route('admin.news.store') }}">
            @csrf
            <div class="form-group">
                <label for="category_id">Категория</label>
                <select name="category_id" id="category_id" class="form-control">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                        @if($category->id===old('category_id')) selected @endif>{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <div class="form-group">
                <label for="title">Заголовок новости</label>
                <input type="text" class="form-control @if($errors->has('title')) alert-danger @endif" name="title" id="title" value="{{ old('title') }}">
            </div>
            <br>
            <div class="form-group">
                <label for="author">Автор новости</label>
                <input type="text" class="form-control @if($errors->has('author')) alert-danger @endif" name="author" id="author" value="{{ old('author') }}">
            </div>
            <br>
            <div class="form-group">
                <label for="image">Изображение</label>
                <input type="file" class="form-control" name="image" id="image">
            </div>

            <br>
            <div class="form-group">
                <label for="status">Статус новости</label>
                <select class="form-control @if($errors->has('status')) alert-danger @endif" name="status" id="status">
                    <option @if(old('status') === 'DRAFT') selected @endif>DRAFT</option>
                    <option @if(old('status') === 'ACTIVE') selected @endif>ACTIVE</option>
                    <option @if(old('status') === 'BLOCK') selected @endif>BLOCK</option>
                </select>
            </div>
            <br>
            <div class="form-group">
                <label for="description">Текст новости</label>
                <textarea type="text" class="form-control @if($errors->has('description')) alert-danger @endif" name="description" id="description">{!! old('description') !!}</textarea>
            </div>
            <br>
            <button type="submit" class="btn btn-success">Добавить новость</button>

        </form>
    </div>
@endsection
