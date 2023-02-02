<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('welcome') }}">Petits Articles</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('welcome') }}">Accueil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('articles') }}">Nos articles</a>
          </li>
        </ul>
        <span class="navbar-text">
          @if (Auth::user())
          <div id="dropdown-compte">
            <button id="mon-compte" class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
              Mon compte
            </button>
            <div id="mon-compte-dropdown" class="dropdown-menu">
              <a class="dropdown-item" href="{{ route('administration') }}">Administration</a>
              <a class="dropdown-item" href="{{ route('logout') }}">Se déconnecter</a>
            </div>
          </div>
          @else
            <a class="nav-link" href="{{ route('login') }}">Se connecter</a>              
          @endif
        </span>
      </div>
    </div>
  </nav>