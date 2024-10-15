<form action="{{route($category->exists ? 'category.update' : 'category.store', $category)}}" method="POST">

    <div class="containers container d-flex align-items-center justify-content-center flex-row gap-3">
        @csrf
        @method($category->exists ? 'PUT' : 'POST')
        <div class="container d-flex align-items-start justify-content-start flex-column">
            <div class="container d-flex align-items-center justify-content-center flex-row">
                <label style="width:20%" class="fw-bolder" for="noms">Nom:</label>
                <input style="width:80%" type="text" placeholder="Nom de la catégorie..." name="nom" value="{{old('nom', $category->nom)}}" id="nom" class="form-control @error('nom') is-invalid @enderror">
            </div>
            @error("nom")
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <input type="submit" name="submit" class="btn btn-primary" value="{{$category->exists ? 'Enregistrer' : 'Créer'}}">

    </div>

</form>
