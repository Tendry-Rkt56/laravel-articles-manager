<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{

    /**
     * Permet de lister tous les articles
     */
    public function index (Request $request)
    {
        $articles = Article::where("nom", 'LIKE', '%'.$request->input('search').'%')->paginate(10);
        return view("articles.index", [
            'articles' => $articles,
            'search' => $request->input('search') ?? '',
        ]);
    }

    public function create ()
    {
        $article = new Article();
        return view('articles.create', [
            'article' => $article,
            'categories' => Category::select('id', 'nom')->get(),
        ]);
    }

    public function store (ArticleRequest $request)
    {
        $article = Article::create($this->arrangeData(new Article(), $request));
        return redirect()->route('articles.index')->with('success', 'Nouvel article crée');
    }

    public function edit (Article $article)
    {
        return view('articles.edit', [
            'article' => $article,
            'categories' => Category::select('id', 'nom')->get(),
        ]);
    }

    public function update (Article $article, ArticleRequest $request)
    {
        // dd($request->validated('category_id'));
        $article->update($this->arrangeData($article, $request));
        return redirect()->route('articles.index')->with('success', 'Article mis à jour');
    }

    private function arrangeData(Article $article, ArticleRequest $request)
    {
        $data = $request->validated();
        /** @var UploadedFile|null $image */
        $image = $request->validated('image');
        if ($image == null || $image->getError()) {
            return $data;
        }
        if ($article->image) {
            Storage::disk('public')->delete($article->image);
        }
        $data['image'] = $image->store('articles', 'public');
        return $data;
    }

    public function delete (Article $article)
    {
        Storage::disk('public')->delete($article->image);
        $article->delete();
        return redirect()->route('articles.index')->with('danger', "L'article a bien été supprimé");
    }

}
