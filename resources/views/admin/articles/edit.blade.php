@extends('base')

@section('content')
    <form class="formulaire" action="{{ route('article-update-admin', $article->id) }}">
        @csrf
        @method('PUT')
        <ul>
            <li>
                <label for="title">Titre de l'article</label>
                <input type="text" id="title"  name="title" value="{{ $article->title }}" />
            </li>
            <li>
                <label for="author">Auteur de l'article</label>
                <input type="text" id="author" name="author" value="{{ $article->author }}" />
            </li>
            <li>
                <label for="subtitle">Sous-titre de l'article</label>
                <input type="text" id="subtitle" name="subtitle" value="{{ $article->subtitle }}" />
            </li>
            <li>
                <label for="content">Contenu de l'article</label>
                <textarea type="text" id="content" name="content">{{ $article->description }}</textarea>
            </li>
            <li>
                <input class="btn btn-primary submitBtn" type="submit" value="Envoyer" />
            </li>
        </ul>
    </form>
@endsection