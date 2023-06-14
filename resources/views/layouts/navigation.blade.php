<!-- NavBar -->
<nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top">
  <div class="navbar-brand">
    <span>Refugio de Animales</span>
  </div>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarToggler">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item">
        <a href="{{route('animal-index')}}" class="nav-link hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md">Animales</a>
      </li>
      @if(Auth::user()->hasRole('admin'))
      <li class="nav-item">
        <a href="{{route('razas')}}" class="nav-link hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md">Razas</a>
      </li>
      <li class="nav-item">
        <a href="{{route('tipos_animal')}}" class="nav-link hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md">Tipo Animal</a>
      </li>
      @endif
      <li class="nav-item">
        <a href="{{route('eventos')}}" class="nav-link hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md">Eventos</a>
      </li>
    </ul>
    <div class="navbar-nav my-2 my-lg-0">
      <div class="row">
        <div class="nav-item">
          <form method="POST" action="{{ route ('logout')}}">
            @csrf
            <a href="#" class="nav-link px-4 py-2 text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2" onclick="event.preventDefault(); this.closest('form').submit();">Log out</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</nav>