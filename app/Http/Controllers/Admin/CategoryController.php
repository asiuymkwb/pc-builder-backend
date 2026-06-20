<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return response()->json(Category::orderBy('sort_order')->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'       => ['required', 'string', 'max:100'],
            'slug'       => ['required', 'string', 'max:100', 'unique:categories,slug'],
            'icon'       => ['nullable', 'string', 'max:100'],
            'sort_order' => ['sometimes', 'integer'],
        ]);

        $category = Category::create($request->validated());

        return response()->json($category, 201);
    }

    public function show(string $id)
    {
        return response()->json(Category::findOrFail($id));
    }

    public function update(Request $request, string $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'name'       => ['sometimes', 'string', 'max:100'],
            'slug'       => ['sometimes', 'string', 'max:100', 'unique:categories,slug,' . $id],
            'icon'       => ['nullable', 'string', 'max:100'],
            'sort_order' => ['sometimes', 'integer'],
        ]);

        $category->update($request->validated());

        return response()->json($category);
    }

    public function destroy(string $id)
    {
        Category::findOrFail($id)->delete();

        return response()->json(['message' => 'Categoria eliminata.']);
    }
}

