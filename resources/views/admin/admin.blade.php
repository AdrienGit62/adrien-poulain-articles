@extends('base')

@section('content')
    <div id="chooseActionAdmin">
        <div id="articles">
            <a class="nav-link" href="{{ route('articles-admin') }}">Les Articles</a>
        </div>
        <div id="users">
            <a class="nav-link" href="{{ route('users-admin') }}">Les Utilisateurs</a>
        </div>
    </div>
@endsection