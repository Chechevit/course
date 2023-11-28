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
}
