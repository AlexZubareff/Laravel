@extends('layouts.admin')
@section('title') Список пользователей @endsection
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Список пользователей</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
{{--
            <div class="btn-group me-2">
                <a href="{{ route('admin.news.create') }}" class="btn btn-sm btn-outline-secondary">Добавить новость</a>
            </div>
--}}
        </div>
    </div>
    <div class="table-responsive">
        @include('inc.messages')
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>#ID</th>
                <th>Имя пользователя</th>
                <th>Email</th>
                <th>Подтверждение email</th>
                <th>Дата регистрации</th>
                <th>Последнее изменение</th>
                <th>Статус Админ</th>
                <th>Опции</th>
            </tr>
            </thead>
            <tbody>
            @forelse($userList as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->emai_verified_at }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>@if($user->updated_at) {{ $user->updated_at->format('d-m-Y H:i') }} @endif</td>
                    <td>@if($user->is_admin == 1) Да @endif</td>
                    <td>
                        <a href="{{ route('admin.user.edit', ['user'=>$user->id]) }}">Ред.</a>
                        &nbsp;
                        <a href="javascript:"  class="delete" {{--rel="{{ $news->id }}"--}} style="color:red;">Удл.</a>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4">Записей нет</td></tr>
            @endforelse
            </tbody>
        </table>
{{--
        {{ $userList->links() }}
--}}
    </div>

@endsection

{{--
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
--}}
