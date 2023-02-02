@extends('base')

@section('content')
    <form class="formulaire" action="{{ route('create-account-store') }}">
        @csrf
        @method('POST')
        <ul>
            <li>
                <label for="username">Nom d'utilisateur</label>
                <input type="text" id="username"  name="username" />
            </li>
            <li>
                <label for="useremail">Email de l'utilisateur</label>
                <input type="email" id="useremail" name="useremail" />
            </li>
            <li>
                <label for="password">Mot de passe de l'utilisateur</label>
                <input type="password" id="password" name="password" />
            </li>
            <li>
                <input class="btn btn-primary submitBtn" type="submit" value="Envoyer" />
            </li>
        </ul>
    </form>
@endsection