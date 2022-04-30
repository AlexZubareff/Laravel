@extends('layouts.admin')
@section('title') Список новостей @endsection
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Список новостей</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('admin.news.create') }}" class="btn btn-sm btn-outline-secondary">Добавить новость</a>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        @include('inc.messages')
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>#ID</th>
                <th>Категория Новости</th>
                <th>Имя источника</th>
                <th>Заголовок Новости</th>
                <th>Статус</th>
                <th>Описание</th>
                <th>Ссылка на новость</th>
                <th>Последнее изменение</th>
                <th>Коментарии</th>
                <th>Опции</th>
            </tr>
            </thead>
            <tbody>
            @forelse($newsList as $news)
                <tr>
                    <td>{{ $news->id }}</td>
                    <td>{{ $news->category->title }}</td>
                    <td>{{ $news->source->name }}</td>
                    <td>{{ $news->title }}</td>
                    <td>{{ $news->status }}</td>
                    <td>{{ $news->description }}</td>
                    <td><a href="{{ $news->news_url }}">{{ $news->news_url }}</a></td>
                    <td>@if($news->updated_at) {{ $news->updated_at->format('d-m-Y H:i') }} @endif</td>
                    <td>
                        <div class="btn-toolbar mb-2 mb-md-0">
                            <div class="btn-group me-2">
                                <a href="{{ route('admin.comments.index', ['news_id'=>$news->id]) }}" class="btn btn-sm btn-outline-secondary">Комент</a>
                            </div>
                        </div>
                    </td>
                    <td>
                        <a href="{{ route('admin.news.edit', ['news'=>$news->id]) }}">Ред.</a>
                        &nbsp;
                        <a href="javascript:"  class="delete" rel="{{ $news->id }}" style="color:red;">Удл.</a>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4">Записей нет</td></tr>
            @endforelse
            </tbody>
        </table>
                {{ $newsList->links() }}
    </div>

@endsection

@push('js')
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function (){
            const el = document.querySelectorAll(".delete");
            el.forEach(function (element, index) {
                element.addEventListener("click", function (){
                    const id = this.getAttribute("rel");
                    if(confirm(`Подтвердите удаление записи с #ID ${id} ?`)) {
                        send(`/admin/news/${id}`).then(()=>{
                            alert("Запись была удалена");
                            location.reload();
                        });
                    }
                });
            });
        });

        async function send(url) {
            let response = await fetch(url, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN':document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            });
            let result = await response.json();
            return result.ok;
        }
    </script>
@endpush
