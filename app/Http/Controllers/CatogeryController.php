<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

use function Pest\Laravel\delete;

class CatogeryController extends Controller
{
    public function index()
    {
        $catagories = Category::all();
        // return $catagories;
        return view('category.index', compact('catagories'));
    }

    public function create()
    {
        return view('category.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255|string',
            'is_active' => 'sometimes',
        ]);
        Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'is_active' => $request->is_active == true ? 1 : 0,
        ]);
        return redirect('categories/create')->with('status', 'Category Created');
    }

    public function edit(int $id)
    {
        $catagory = Category::findOrFail($id);
        // return $catagory;
        return view('category.edit', compact('catagory'));
    }
    public function update(Request $request, int $id)
    {

        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255|string',
            'is_active' => 'sometimes',
        ]);


        Category::findOrFail($id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'is_active' => $request->is_active == true ? 1 : 0,
        ]);
        return redirect()->back()->with('status', 'Category Updated');
    }

    public function delete(int $id)
    {
        $catagory = Category::findOrFail($id);
        $catagory->delete();
        return redirect()->back()->with('status', 'Category Deleted');
    }
}
