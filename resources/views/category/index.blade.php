@extends('base')
@section('title', 'Les catégories')
@section('content')

    <div class="d-flex align-items-center justify-content-between gap-1">
        <h2 class="my-4">Les catégories</h2>
        <a href="{{route('category.create')}}" class="btn btn-secondary btn-sm">Ajouter une nouvelle catégorie</a>
    </div>

    <form class="gap-2 d-flex align-items-center justify-content-start flex-row" style="width:70%">
        <input type="text" value="{{$search}}" placeholder="Rechercher..." class="form-control" style="width:30%" name="search">
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
                    <th>N°</th>
                    <th>Nom</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->nom}}</td>
                        <td>
                            <div class="d-flex gap-1 justify-content-end w-70">
                                <a href="{{route('category.edit', $category)}}" class="btn btn-primary btn-sm">Modifier</a>
                                <form action="{{route('category.destroy', $category)}}" method="POST">
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
    {{$categories->links()}}

@endsection

