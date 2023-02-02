@extends('base')

@section('content')
    <div class="d-flex justify-content-center mt-3">
        {{ $articles->links('vendor.pagination.custom') }}
    </div>
    <a class="btn btn-primary" href="{{ route('article-add-admin') }}">Ajouter un articles</a>
    <div id="listArticles" class=" d-flex justify-content-center mt-3">
        @if ($articles)
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Auteur</th>
                    <th scope="col">Titre</th>
                    <th scope="col">Sous-titre</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articles as $item)
                    <tr>
                        <th scope="row"><a href="{{ route('article-edit-admin', $item->id) }}">{{ $item->id }}</a></th>
                        <td scope="row">{{ $item->author }}</td>
                        <td scope="row">{{ $item->title }}</td>
                        <td scope="row">{{ $item->subtitle }}</td>
                        <td scope="row" class="actionsBtn">
                            <a class="btn btn-primary" href="{{ route('article-edit-admin', $item->id) }}">Modifier</a>
                            <a class="btn btn-primary" href="{{ route('article-delete-admin', $item->id) }}">Supprimer</a>
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
        {{ $articles->links('vendor.pagination.custom') }}
    </div>
@endsection