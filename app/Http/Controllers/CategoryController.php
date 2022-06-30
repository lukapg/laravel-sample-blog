<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;

class CategoryController extends Controller
{

    public function index()
    {
        return CategoryResource::collection(Category::all());
    }

    public function show(Category $category)
    {
        return response()->json(['categories' => new CategoryResource($category)]);
    }

    public function store(CategoryRequest $request)
    {
        return response()->json(['category' => Category::create($request->validated())], 200);
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $category->fill($request->validated());
        if (!$category->save()) {
            return response()->json(['error' => 'Error updating category'], 500);
        }
        return response()->json(['message' => 'Category updated successfully'], 200);
    }

    public function destroy(Category $category)
    {
        if (!$category->delete()) {
            return response()->json(['error' => 'Error deleting category'], 500);
        }
        return response()->json(['message' => 'Category deleted successfully'], 200);
    }
}