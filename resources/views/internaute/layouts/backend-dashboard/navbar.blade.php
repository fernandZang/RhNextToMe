<!-- Navbar -->
<nav class="main-header navbar navbar-expand bg-blue-500">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('internaute.home')}}" class="nav-link text-bold text-white">Accueil</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->



    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Authentication Links -->
        @guest

        @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  <img src="{{asset('img/cours-info2.jpg')}}" class="img-circle elevation-1 mr-1 text-white text-bold p-1" alt="GIPAN" style="border-right: solid 3px rgb(51, 51, 51); opacity: .7;" width="43px">{{ Auth::user()->nom }}
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        @endguest
    </ul>
  </nav>
  <!-- /.navbar -->
