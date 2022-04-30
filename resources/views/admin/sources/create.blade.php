@extends('layouts.admin')
@section('title') Добавить источник @endsection
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Добавить источник</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
    </div>
    <div class="row">
        @include('inc.messages')
        <form  method="post" action="{{ route('admin.sources.store') }}">
            @csrf
            <div class="form-group">
                <label for="name">Название источника</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
            </div>
            <br>
            <div class="form-group">
                <label for="url">URL</label>
                <input type="text" class="form-control" name="url" id="url" value="{{ old('url') }}">
            </div>
            <br>
            <div class="form-group">
                <label for="description">Описание источника</label>
                <textarea type="text" class="form-control" name="description" id="description">{!! old('description') !!}</textarea>
            </div>
            <br>
            <button type="submit" class="btn btn-success">Добавить источник</button>

        </form>
    </div>
@endsection
