@extends('base')
@section('title', 'Accueil')
@section('containers')

    <div class="container d-flex align-items-center justify-content-center flex-row gap-3">
        <a href="{{route('articles.index')}}" class="card-content card1">
            <h3>{{$articles}}</h3>
            <h2>Les articles</h2>
        </a>
        <a href="{{route('category.index')}}" class="card-content card2">
            <h3>{{$categories}}</h3>
            <h2>Les catégories</h2>
        </a>
    </div>

@endsection
