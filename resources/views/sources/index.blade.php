@extends('layouts.main')
@section('title') Список источников @endsection
@section('header')
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">Список источников</h1>
        </div>
    </div>
@endsection

@section('sourceContent')

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>#ID</th>
                <th>Имя Источника</th>
                <th>URL</th>
                <th>Описание</th>
            </tr>
            </thead>
            <tbody>
            @forelse($sourceList as $source)
                <tr>
                    <td>{{ $source->id }}</td>
                    <td>{{ $source->name }}</td>
                    <td>{{ $source->url }}</td>
                    <td>{{ $source->description }}</td>
                </tr>
            @empty
                <tr><td colspan="4">Записей нет</td></tr>
            @endforelse
            </tbody>
        </table>
        {{ $sourceList->links() }}
    </div>

@endsection
