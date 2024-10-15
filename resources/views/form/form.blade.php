<form action="{{route($article->exists ? 'articles.update' : 'articles.store', $article)}}" method="POST" enctype="multipart/form-data">

    <div class="containers container d-flex align-items-center justify-content-center flex-column gap-3">
        @csrf
        @method($article->exists ? 'PUT' : 'POST')
        @include('form.input', ['name' => 'nom', 'label' => 'Nom', 'placeholder' => 'Nom...'])
        @include('form.input', ['name' => 'price', 'label' => 'Prix', 'type' => 'number', 'placeholder' => 'Prix...'])
        @include('form.input', ['name' => 'image', 'label' => 'Image associée', 'type' => 'file'])
        <input type="submit" name="submit" class="btn btn-primary" value="{{$article->exists ? 'Enregistrer' : 'Créer'}}">
    </div>

</form>
