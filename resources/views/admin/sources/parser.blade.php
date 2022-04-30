@extends('layouts.admin')
@section('title') Список источников @endsection
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <ul>
            <h1 class="h2">Парсер для источника:</h1>
            <li><h5>Категория - {{$dataList['title']}}</h5></li>
            <li><h5>URL источника - {{$dataList['link']}}</h5></li>
            <li><h5>Описание источника - {{$dataList['description']}}</h5></li>
        </ul>
                <div class="btn-toolbar mb-2 mb-md-0">
{{--            <div class="btn-group me-2">--}}
{{--                <a href="{{ route('admin.save.parse', [ 'source_id'=> $source->id, $source]) }}" class="btn btn-sm btn-outline-secondary">Сохранить Новости в БД</a>--}}
{{--            </div>--}}
        </div>
    </div>
    <div class="table-responsive">
        @include('inc.messages')
        <table class="table table-bordered">
            <thead>
            <tr>
{{--                <th>#ID</th>--}}
                <th>Заголовок Новости</th>
                <th>Ссылка на новость</th>
                <th>Текст</th>
{{--                <th>Парсер</th>--}}
{{--                <th>Опции</th>--}}
            </tr>
            </thead>
            <tbody>
            @forelse($dataList['news'] as $key => $item)
{{--                @dump($data)--}}
                <tr>
{{--                    <td>{{ $source->id }}</td>--}}
                    <td>{{ $item['title'] }}</td>
                    <td><a href="{{ $item['link'] }}">{{ $item['link'] }}</a></td>
                    <td>{{ $item['description'] }}</td>
{{--                    <td>@if($source->updated_at) {{ $source->updated_at->format('d-m-Y H:i') }} @endif</td>--}}
{{--                    <td>--}}
{{--                        <div class="btn-toolbar mb-2 mb-md-0">--}}
{{--                            <div class="btn-group me-2">--}}
{{--                                <a href="{{ route('admin.save.parse', ['title'=>$item['title'], 'description'=>$item['description'], 'source_id'=> $source->id, $source]) }}" class="btn btn-sm btn-outline-secondary">Сохранить новость</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </td>--}}

{{--                    <td>--}}
{{--                        <a href="{{ route('admin.sources.edit', [$source]) }}">Ред.</a>--}}
{{--                        &nbsp;--}}
{{--                        <a href="javascript:;" style="color:red;">Удл.</a>--}}
{{--                    </td>--}}
                </tr>
            @empty
                <tr><td colspan="4">Записей нет</td></tr>
            @endforelse
            </tbody>
        </table>
{{--        {{ $dataList['news']->links() }}--}}
    </div>

@endsection
