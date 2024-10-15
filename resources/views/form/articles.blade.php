<form action="{{route($article->exists ? 'articles.update' : 'articles.store', $article)}}" method="POST" enctype="multipart/form-data">

    <div class="containers container d-flex align-items-center justify-content-center flex-column gap-3">
        @csrf
        @method($article->exists ? 'PUT' : 'POST')
        @include('form.input', ['name' => 'nom', 'label' => 'Nom', 'placeholder' => 'Nom...', 'isArticle' => 'article'])
        @include('form.input', ['name' => 'price', 'label' => 'Prix', 'type' => 'number', 'placeholder' => 'Prix...', 'isArticle' => 'article'])
        @include('form.input', ['name' => 'image', 'label' => 'Image associée', 'type' => 'file', 'isArticle' => 'article'])
        <div class="container d-flex align-items-center justify-content-center flex-row">
            <label style="width:20%" class="fw-bolder" for="">Catégorie associée:</label>
            <select style="width:80%"  class="form-control" name="category_id" id="category">
                <option value="">Séléctionner une catégorie</option>
                @foreach ($categories as $category)
                    <option @selected((old('category_id', $article->category_id) == $category->id)) value="{{$category->id}}">{{$category->nom}}</option>
                @endforeach
            </select>
        </div>
        <input type="submit" name="submit" class="btn btn-primary" value="{{$article->exists ? 'Enregistrer' : 'Créer'}}">
    </div>

</form>
