@extends('layouts.main')
@section('header')

    @include('inc.messages')
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
