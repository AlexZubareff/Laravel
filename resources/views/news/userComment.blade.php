@extends('layouts.main')
@section('header')
    <div>Имя: {{ $name }}</div>
    <div>Комментарий: {{ $comment }}</div>
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">комментарий добавлен в файл data.txt расположенный в папке storage/app/public</h1>
        </div>
    </div>
{{--
    <br><br>
    <div class="row" >
        <h4>скачать файл с комментарием</h4>
        <form  method="post" action="{{ route('userComment.download') }}">
            @csrf
            <div class="form-group">
                   <br>
            <button type="submit" class="btn btn-success">Скачать</button>

        </form>
    </div>
--}}
@endsection
