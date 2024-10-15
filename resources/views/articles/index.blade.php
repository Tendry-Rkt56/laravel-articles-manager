@extends('base')
@section('title', 'Les articles')
@section('content')

    <div class="d-flex align-items-center justify-content-between gap-1">
        <h2 class="my-4">Les articles</h2>
        <a href="{{route('articles.create')}}" class="btn btn-secondary btn-sm">Ajouter un nouvel article</a>
    </div>

    <form class="gap-2 d-flex align-items-center justify-content-start flex-row" style="width:70%">
        <input type="text" value="{{$search}}" placeholder="Rechercher..." class="form-control" style="width:30%" name="search">
        <input type="number" value="{{$paginator}}" class="form-control" style="width:30%" placeholder="Pagination..." name="paginator">
        <input type="submit" class="btn btn-outline-primary btn-sm">
    </form>

    <div class="my-4 container-fluid d-flex align-items-center justify-content-center flex-column">
        @if (session('success'))
            <div class="container-fluid my-1 alert alert-success d-flex align-items-center justify-content-center">
                {{session('success')}}
            </div>
        @endif
        @if (session('danger'))
            <div class="container-fluid my-1 alert alert-danger d-flex align-items-center justify-content-center">
                {{session('danger')}}
            </div>
        @endif
        <table class="my-4 table table-striped">
            <thead>
                <tr>
                    <th></th>
                    <th>Image</th>
                    <th>Nom</th>
                    <th>Prix</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articles as $article)
                    <tr>
                        <td>{{$article->id}}</td>
                        <td>
                            @if ($article->image)
                            <img class="image" src="{{$article->imageUrl()}}" alt="">
                            @endif
                        </td>
                        <td>{{$article->nom}}</td>
                        <td class="fw-bolder">{{number_format($article->price, 0, ',', ' ')}} Ar</td>
                        <td>
                            <div class="d-flex gap-1 justify-content-end w-70">
                                <a href="{{route('articles.edit', $article)}}" class="btn btn-primary btn-sm">Modifier</a>
                                <form action="{{route('articles.delete', $article)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-danger btn-sm" name="" value="Supprimer" id="">
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{$articles->links()}}

@endsection

