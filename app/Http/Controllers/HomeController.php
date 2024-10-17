<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function home()
    {
        $articles = Article::all()->count();
        $categories = Category::all()->count();
        return view('welcome', [
            'articles' => $articles,
            'categories' => $categories,
        ]);
    }

}
