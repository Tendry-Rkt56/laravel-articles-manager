<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function home()
    {
        $articles = Article::all()->count();
        return view('welcome', [
            'articles' => $articles,
        ]);
    }

}
