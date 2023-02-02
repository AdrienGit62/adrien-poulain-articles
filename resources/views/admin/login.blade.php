@extends('base')

@section('content')
    @if (session('error'))
        <div class="alert alert-warning" role="alert">
            {{ session('error') }}
        </div>
    @endif
    <form class="formulaire" action="{{ route('administration') }}">
        @csrf
        @method('POST')
        <ul>
            <li>
                <label for="email">Email</label>
                <input type="email" id="email" name="email"/>
            </li>
            <li>
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" />
            </li>
            <li>
                <input class="btn btn-primary submitBtn" type="submit" value="Envoyer" />
            </li>
            <li>
                <a href="{{ route('create-account') }}">Créer un compte ?</a>
            </li>
        </ul>
    </form>
@endsection