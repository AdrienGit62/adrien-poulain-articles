@extends('base')

@section('content')
    <div class="d-flex justify-content-center mt-3">
        {{ $users->links('vendor.pagination.custom') }}
    </div>
    <a class="btn btn-primary" href="{{ route('user-add-admin') }}">Ajouter un utilisateur</a>
    <div id="listUsers" class=" d-flex justify-content-center mt-3">
        @if ($users)
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">email</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $item)
                    <tr>
                        <th scope="row">{{ $item->id }}</th>
                        <td scope="row">{{ $item->name }}</td>
                        <td scope="row">{{ $item->email }}</td>
                        <td scope="row" class="actionsBtn">
                            <a class="btn btn-primary" href="{{ route('users-edit-admin', $item->id) }}">Modifier</a>
                            <a class="btn btn-primary" href="{{ route('user-delete-admin', $item->id) }}">Supprimer</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @else
            <p>Aucun article pour le moment</p>
        @endif
            
    </div>
    <div class="d-flex justify-content-center mt-2">
        {{ $users->links('vendor.pagination.custom') }}
    </div>
@endsection