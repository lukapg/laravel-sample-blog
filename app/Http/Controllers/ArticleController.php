<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Http\Resources\ArticleResource;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        return ArticleResource::collection(Article::all());
    }

    public function store(ArticleRequest $request)
    {
        return response()->json(['article' => Article::create($request->validated())], 200);
    }

    public function show(Article $article)
    {
        return response()->json(['article' => new ArticleResource($article)], 200);
    }

    public function update(ArticleRequest $request, Article $article)
    {
        $article->fill($request->validated());
        if (!$article->save()) {
            return response()->json(['error' => 'Error updating article'], 500);
        }
        return response()->json(['message' => 'Article updated successfully'], 200);
    }

    public function destroy(Article $article)
    {
        if (!$article->delete()) {
            return response()->json(['error' => 'Error deleting article'], 500);
        }
        return response()->json(['message' => 'Article deleted successfully'], 200);
    }
}