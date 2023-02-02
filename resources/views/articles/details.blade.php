@extends('base')

@section('content')
    <div id="details">
        <a href="{{ route('articles') }}" class="btn btn-primary">Retour à la liste des articles</a>
        <div id="detailsContent">
            <div class="card" id="detailsCard">
                <div class="card-body">
                    <h5 class="card-title">{{ $article->title }}</h5>
                    <p class="card-text">{{ $article->subtitle }}</p>
                    <p class="card-text">{{ $article->description }}</p>
                    <p class="card-text">{{ $article->author }}</p>
                    <p class="card-text">{{ $article->created_at }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection