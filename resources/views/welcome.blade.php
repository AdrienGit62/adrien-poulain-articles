@extends('base')

@section('content')
    <div id="welcomePage">
        <h3 id="welcome">Welcome to my WEBSITE</h3>
        <a href="{{ route('articles') }}" class="btn btn-primary">Voir nos articles</a>
    </div>
@endsection