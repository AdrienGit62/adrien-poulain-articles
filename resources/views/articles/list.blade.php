@extends('base')

@section('content')
    <div class="d-flex justify-content-center mt-3">
        {{ $articles->links('vendor.pagination.custom') }}
    </div>
    <div id="listArticles" class="justify-content-center mt-1">
        @if ($articles)
            @foreach ($articles as $item)
                <div class="card" style="width: 18rem;">
                    <div class="card-body" id="contenuCarte">
                        <h5 class="card-title">{{ $item->title }}</h5>
                        <p class="card-text">{{ $item->author }}</p>
                        <a href="{{ route('article', $item->slug) }}" class="btn btn-primary">Voir les détails</a>
                    </div>
                </div>
            @endforeach
        @else
            <p>Aucun article pour le moment</p>
        @endif
    </div>
    <div class="d-flex justify-content-center mt-2">
        {{ $articles->links('vendor.pagination.custom') }}
    </div>
@endsection