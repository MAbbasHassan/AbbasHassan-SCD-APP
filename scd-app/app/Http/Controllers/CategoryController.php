<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categoriess = Category::get();
        return view('category/index', compact('categoriess'));
    }

    public function create()
    {
        return view('category/create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|string',
            'description' => 'required|max:255|string',
            'is_active' => 'sometimes'
        ]);

        Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'is_active' => $request->is_active == true ? 1:0
        ]);
        return redirect('categoriess/create')->with('status', 'Category created successfully');
    }

     public function edit(int $id){
         $category= Category::findOrFail($id);
       //  return $category;
       return view('category/edit', compact('category'));
     }

    public function update(Request $request, int $id){

        $request->validate([
            'name' => 'required|max:255|string',
            'description' => 'required|max:255|string',
            'is_active' => 'sometimes'
        ]);

        Category::findOrFail($id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'is_active' => $request->is_active == true ? 1:0
        ]);
        return redirect()->back()->with('status', 'Category updated successfully');
    }

    public function destroy(int $id){
        $category= Category::findOrFail($id);
        $category->delete();
        return redirect()->back()->with('status', 'Category updated successfully');
    }
}
