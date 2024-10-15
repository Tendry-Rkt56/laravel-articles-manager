<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{


    public function index(Request $request)
    {
        $categories = Category::where("nom", 'LIKE', '%'.$request->input('search').'%')->paginate(10);
        return view("category.index", [
            'categories' => $categories,
            'search' => $request->input('search') ?? '',
        ]);
    }

    public function create ()
    {
        $category = new Category();
        return view('category.create', [
            'category' => $category,
        ]);
    }

    public function store (CategoryRequest $request)
    {
        $category = Category::create($request->validated());
        return redirect()->route('category.index')->with('success', 'Nouvelle catégorie créée');
    }

    public function edit (Category $category)
    {
        return view('category.edit', ['category' => $category]);
    }

    public function update(Category $category, CategoryRequest $request)
    {
        $category->update($request->validated());
        return redirect()->route('category.index')->with('success', 'Catégorie N°'.$category->id.' mise à jour');
    }

    public function destroy(Category $category)
    {
        $string = "Catégorie N° $category->id supprimée";
        $category->delete();
        return redirect()->route('category.index')->with('danger', $string);
    }


}
