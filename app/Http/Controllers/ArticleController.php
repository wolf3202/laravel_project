<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleCreateRequest;
use App\Http\Requests\ArticleEditRequest;
use App\Http\Resources\ArticleResource;
use App\Article;

class ArticleController extends Controller
{
    public function index()
    {
        return ArticleResource::collection(Article::all());
    }

    public function show(Article $article)
    {
        return $article;
    }

    public function store(ArticleCreateRequest $request)
    {
        $article = Article::create($request->all());

        return response()->json($article, 201);
    }

    public function update(ArticleEditRequest $request, Article $article)
    {
        $article->update($request->all());


        return response()->json($article, 200);
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return response()->json(null, 204);
    }
}
