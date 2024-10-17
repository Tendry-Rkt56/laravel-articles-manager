<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
    <link rel="stylesheet" href="{{asset('css/header.css')}}">
</head>
<body>
    @php
        $route = request()->route()->getName();
    @endphp

    <header>
        <div style='width:20%' class="entete">
            <h2>CRUD</h2>
        </div>
        @auth
            <nav class="d-flex align-items-center justify-content-center flex-row gap-3" style='width:40%'>
                <ul>
                    <li class='nav-item'><a @class(['nav-link', 'active' => str_contains($route,'articles.')]) href="{{route('articles.index')}}">Les articles</a></li>
                    <li class='nav-item'><a @class(['nav-link', 'active' => str_contains($route,'category.')]) href="{{route('category.index')}}">Les catégories</a></li>
                </ul>
                <form action="{{route('auth.logout')}}" method="POST">
                    @csrf
                    @method("DELETE")
                    <input type="submit" class="btn btn-sm btn-danger" value="Se déconnecter">
                </form>
            </nav>
        @endauth
        @guest
            <a href="{{route('auth.loginView')}}" class="justify-self-end btn btn-primary">Se connecter</a>
        @endguest
    </header>

    <div class="container content">
        @yield('content')
    </div>

    <div class="container containers">
        @yield('containers')
    </div>

</body>
</html>
