@extends('layouts.admin')
@section('title') Список источников @endsection
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Список источников</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('admin.sources.create') }}" class="btn btn-sm btn-outline-secondary">Добавить источник</a>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        @include('inc.messages')
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>#ID</th>
                <th>Название источника</th>
                <th>URL</th>
                <th>Описание</th>
                <th>Последнее изменение</th>
                <th>Парсер</th>
                <th>Опции</th>
            </tr>
            </thead>
            <tbody>
            @forelse($sourceList as $source)
                <tr>
                    <td>{{ $source->id }}</td>
                    <td>{{ $source->name }}</td>
                    <td>{{ $source->url }}</td>
                    <td>{{ $source->description }}</td>
                    <td>@if($source->updated_at) {{ $source->updated_at->format('d-m-Y H:i') }} @endif</td>
                    <td>
                        <div class="btn-toolbar mb-2 mb-md-0">
                            <div class="btn-group me-2">
                                <a href="{{ route('admin.parser', [$source]) }}" class="btn btn-sm btn-outline-secondary">Распарсить</a>
                            </div>
                        </div>
                    </td>

                    <td>
                        <a href="{{ route('admin.sources.edit', [$source]) }}">Ред.</a>
                        &nbsp;
                        <a href="javascript:;" style="color:red;">Удл.</a>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4">Записей нет</td></tr>
            @endforelse
            </tbody>
        </table>
        {{ $sourceList->links() }}
    </div>

@endsection
