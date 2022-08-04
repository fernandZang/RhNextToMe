<!-- Navbar -->
<nav class="main-header navbar navbar-expand bg-blue-500 p-0 pb-5" style="height: 70px;">
    <!-- Left navbar links -->
    <ul class="navbar-nav pt-5">
        <li class="nav-item">
            <a class="nav-link text-white" data-widget="pushmenu" href="#" role="button"><i
                    class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('internaute.home') }}" class="nav-link text-bold text-white">Accueil</a>
        </li>


    </ul>

    <!-- SEARCH FORM -->

    <div class="col-md-3 p-0 m-0 pt-5">

    </div>
    <!--
    <div class="text-center hover:bg-blue-400 focus:outline-none focus:ring-2 focus:ring-offset-2 ml-4 pt-5">
        <div class="">
            <a href="" class="text-gray-700 block  nav-link text-white text-bold" >recherche avancée</a>
        </div>
    </div>
-->

    <div class="text-center hover:bg-blue-400 focus:outline-none focus:ring-2 focus:ring-offset-2 ml-4 pt-5">
        <div class="">
            <a href=""
                class="text-gray-700 block  nav-link text-white text-bold">recherche avancée</a>
        </div>
    </div>

    <!-- tableau de bord -->

    <div class="text-center hover:bg-blue-400 focus:outline-none focus:ring-2 focus:ring-offset-2 ml-4 pt-5">

        <div class="">
            <a href="" class="text-gray-700 block  nav-link text-white text-bold">
                Tableau de bord
            </a>
        </div>

    </div>


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto m-0 p-0">
        <!-- Authentication Links -->

        <li></li>
        @guest

        @else
            <div class="row">
                <div class="col m-0 mr-1  ">
                    <img src="{{ Storage::url(Auth::user()->image_profil) }}"
                        class="img-circle  text-white text-bold bg-blue-500 text-center mt-1" alt=""
                        style="" width="70px">
                </div>
            </div>
            <li class="nav-item dropdown p-0 m-0">
                <a id="navbarDropdown" class="nav-link dropdown-toggle m-0 " href="#"  data-toggle="dropdown">
                    <div class="col text-white text-bold pt-4">
                        {{ Auth::user()->name }}
                    </div>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                        {{ __('Se Deconnecter') }}
                    </a>
                    <a class="dropdown-item" href="">
                        {{ __('Changer ma photo') }}
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
