<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    public function index ()
    {
        $articles = Article::all();
        return view("articles.index", [
            'articles' => $articles,
        ]);
    }

    public function create ()
    {
        $article = new Article();
        return view('articles.create', [
            'article' => $article,
        ]);
    }

    public function store (ArticleRequest $request)
    {
        $article = Article::create($request->validated());
        return redirect()->route('articles.index')->with('success', 'Nouvel article crée');
    }

    public function edit (Article $article)
    {
        return view('articles.edit', ['article' => $article]);
    }

    public function update (Article $article, ArticleRequest $request)
    {
        $article->update($request->validated());
        return redirect()->route('articles.index')->with('success', 'Article mis à jour');
    }

    public function delete (Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index')->with('danger', "L'article a bien été supprimé");
    }

}
