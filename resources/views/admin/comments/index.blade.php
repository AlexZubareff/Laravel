@extends('layouts.admin')
@section('title') Комментарии @endsection
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">@if($commentList[0]) Комментарии к новости - {{ $commentList[0]->news->title }} @else Комментариев нет@endif </h1>
    </div>
    <div class="table-responsive">
        @include('inc.messages')
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>#ID</th>
                <th>Название новости</th>
                <th>Имя автора</th>
                <th>Коментарии</th>
                <th>Последнее изменение</th>
                <th>Опции</th>
            </tr>
            </thead>
            <tbody>
            @forelse($commentList as $comment)
                <tr>
                    <td>{{ $comment->id }}</td>
                    <td>{{ $comment->news->title }}</td>
                    <td>{{ $comment->name }}</td>
                    <td>{{ $comment->description }}</td>
                    <td>@if($comment->updated_at) {{ $comment->updated_at->format('d-m-Y H:i') }} @endif</td>
                    <td>
                        <a href="{{ route('admin.comments.edit', ['comment'=>$comment->id]) }}">Ред.</a>
                        &nbsp;
                        <a href="javascript:;" style="color:red;">Удл.</a>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4">Комментариев нет</td></tr>
            @endforelse
            </tbody>
        </table>
        {{ $commentList->links() }}
    </div>

@endsection

