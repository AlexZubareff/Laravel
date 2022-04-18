@extends('layouts.app')
@section('content')
    <div class="row offset-2">
        <h2>Добро пожаловать, {{ Auth::user()->name }}</h2>
        @if(Auth::user()->is_admin)
            <a href="{{ route('admin.index') }}">Войти в админку</a>
        @endif
    </div>
@endsection
