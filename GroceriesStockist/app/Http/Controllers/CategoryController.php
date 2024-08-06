<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        return view('category.category', compact('categories'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function insert(Request $request)
    {

        // Validate the request data
        $request->validate([
            'name' => 'required|max:255|string',
            'description' => 'required|max:255|string',
            'status' => 'sometimes'
        ]);

        // Insert data into the database
        Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status == true ? 1 : 0,
        ]);

        return redirect('category')->with('status', 'Category created successfully.');
    }

    public function edit($id)
    {
        $category = Category::findorfail($id);
        return view('category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|max:255|string',
            'description' => 'required|max:255|string',
            'status' => 'sometimes'
        ]);

        // Update the database record
        $category = Category::findorfail($id);
        $category->update([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status == true ? 1 : 0,
        ]);

        return redirect('category')->with('status', 'Category updated successfully.');
    }

    public function destroy($id)
    {
        // Delete the database record
        $category = Category::findorfail($id);
        $category->delete();
        return redirect('category')->with('status', 'Category deleted successfully.');
    }
}
