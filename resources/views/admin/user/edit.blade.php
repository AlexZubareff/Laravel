@extends('layouts.admin')
@section('title') Редактировать пользователя  @endsection
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Изменить данные пользователя - {{ $user->name }}</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
    </div>
    <div class="row">
        @include('inc.messages')
        <form  method="post" action="{{ route('admin.user.update', ['user'=>$user]) }}">
            @csrf
            @method('put')
            <br>
            <div class="form-group">
                <label for="name">Имя пользователя</label>
                <input type="text" class="form-control @if($errors->has('name')) alert-danger @endif" name="name" id="name" value="{{ $user->name }}">
                @error('name')<strong style="color: red;">{{ $message }}</strong> @enderror
            </div>
            <br>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control @if($errors->has('email')) alert-danger @endif" name="email" id="email" value="{{ $user->email }}">
                @error('email')<strong style="color: red;">{{ $message }}</strong> @enderror
            </div>
--}}        <br>
            <div class="form-group">
                <label for="newPassword">Новый пароль</label>
                <input type="text" class="form-control @if($errors->has('newPassword')) alert-danger @endif" name="newPassword" id="newPassword" >
                @error('newPassword')<strong style="color: red;">{{ $message }}</strong> @enderror
            </div>
            <br>
            <div class="form-group">
                <label for="created_at">Дата регистрации</label>
                <input type="text" class="form-control @if($errors->has('created_at')) alert-danger @endif" name="created_at" id="created_at" value="{{ $user->created_at }}">
                @error('created_at')<strong style="color: red;">{{ $message }}</strong> @enderror
            </div>
            <br>
            <div class="form-group">
                <label for="updated_at">Последние изменения</label>
                <input type="text" class="form-control @if($errors->has('updated_at')) alert-danger @endif" name="updated_at" id="updated_at" value="{{ $user->updated_at }}">
                @error('updated_at')<strong style="color: red;">{{ $message }}</strong> @enderror
            </div>
            <br>
            <div class="form-group">
                <label for="is_admin">Статус Администратора</label>
                <select class="form-control" name="is_admin" id="is_admin">
                    <option @if('ДА') value="1" selected @endif>ДА</option>
                    <option @if('НЕТ') value="0" selected @endif>НЕТ</option>
                </select>
            </div>
            <br>

            <button type="submit" class="btn btn-success">Сохранить изменения</button>

        </form>
    </div>
@endsection
