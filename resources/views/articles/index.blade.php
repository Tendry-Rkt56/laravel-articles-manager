@extends('base')
@section('title', 'Les articles')
@section('content')

    <h2 class="my-4">Les articles</h2>

    <table class="table table-striped">
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
                    <td></td>
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

@endsection

