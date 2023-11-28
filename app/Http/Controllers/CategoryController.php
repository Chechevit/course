<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function createCategory(Request $request)
    {
        $createCategory = $request->all();
        Category::create([
            "title" => $createCategory["category_title"],

        ]);
        return redirect("/admin");
    }

    public function index(Category $category){
        return view('category', ['categories'=>$category->all()]);
    }

    public function courses($id_category){
        $category = Category::find($id_category);
        return view('course', ['courses'=>$category->course]);
    }
}
