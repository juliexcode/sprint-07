<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Zanbob</title>
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body style="background-color: black;">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a style="color: rgba(44, 117, 255, 1);" class="navbar-brand" href="{{ url('/') }}">
                    Zanbob
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a style="color: rgba(44, 117, 255, 1);" class="nav-link" href="{{ route('login') }}">Connexion</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a style="color: rgba(44, 117, 255, 1);" class="nav-link" href="{{ route('register') }}">Inscription</a>
                        </li>
                        @endif



                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                                <a class="dropdown-item" style="color: rgba(44, 117, 255, 1);" href="{{route('topics.create')}}"> Ajouter un film</a>

                                <a style="color: rgba(44, 117, 255, 1);" class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Déconnexion
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>


                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <footer class="mt-auto">
        <div id="foot" style="text-align: center; ">

            <h5>Sprint_07</h5>

            <a target="_blank" href="https://github.com/juliexcode/sprint-07.git" class="btn btn-primary">lien vers le github du projet</a>
            <div>
                <div class="col">

                    <a href="https://www.linkedin.com/in/julie-perianmodely-602045209/" target="_blank">
                        @Julie
                    </a>

                </div>
                <div class="col">

                    <a href="https://www.linkedin.com/in/quentin-louis-462318235/" target="_blank">@Quentin</a>

                </div>
                <div class="col">

                    <a href="https://www.linkedin.com/in/romain-felicite-04635721a/" target="_blank">@Romain</a>

                </div>

                <div style="height: 50px;">

                </div>
            </div>
        </div>

    </footer>
</body>

</html>

<style>
    #foot {
        background-color: rgba(39, 39, 39, 1);
        color: azure;
        padding-top: 20px;
        border: 1px solid rgba(44, 117, 255, 1);
        border-left: none;
    }

    a {
        text-decoration: none;
    }
</style>