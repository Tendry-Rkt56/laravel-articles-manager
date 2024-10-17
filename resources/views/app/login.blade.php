@extends('base')
@section('title', 'Connexion')
@section('containers')

    <form action="{{route('auth.login')}}" class="form container vstack d-flex align-items-center justify-content-center flex-column gap-3" style="width:50%" method="POST">
        @csrf
        @if (session('danger'))
            <div class="d-flex align-items-center justify-content-center alert alert-danger container">
                {{session('danger')}}
            </div>
        @endif
        <div class="container d-flex align-items-center justify-content-center flex-row gap-2">
            <label for="email" class="fw-bolder" style="width:20%">Email:</label>
            <input type="email" name="email" class="form-control" style="width:80%" placeholder="Votre email..." value="{{old('email')}}">
        </div>
        <div class="container d-flex align-items-center justify-content-center flex-row gap-2">
            <label for="password" class="fw-bolder" style="width:20%">Mot de passe:</label>
            <input type="password" name="password" class="form-control" style="width:80%" placeholder="Votre email...">
        </div>
        <input type="submit" class="mt-2 btn btn-primary" value="Connexion">
    </form>

@endsection
