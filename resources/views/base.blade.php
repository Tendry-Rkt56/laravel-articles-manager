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
            <h2>Modifi<span>cation</span></h2>
        </div>
        <nav style='width:40%'>
            <ul>
                <li class='nav-item'><a @class(['nav-link', 'active' => str_contains($route,'articles.')]) href="{{route('articles.index')}}">Les articles</a></li>
                <li class='nav-item'><a @class(['nav-link', 'active' => str_contains($route,'categories.')]) href="">Les commentaires</a></li>
            </ul>
        </nav>
    </header>

    <div class="container content">
        @yield('content')
    </div>

    <div class="container containers">
        @yield('containers')
    </div>

</body>
</html>
