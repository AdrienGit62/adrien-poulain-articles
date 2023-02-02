@extends('base')

@section('content')
    <form class="formulaire" action="{{ route('user-update-admin', $user->id) }}">
        @csrf
        @method('PUT')
        <ul>
            <li>
                <label for="username">Nom d'utilisateur</label>
                <input type="text" id="username"  name="username" value="{{ $user->name }}"/>
            </li>
            <li>
                <label for="useremail">Email de l'utilisateur</label>
                <input type="email" id="useremail" name="useremail" value="{{ $user->email }}"/>
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