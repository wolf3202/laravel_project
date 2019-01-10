<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthorCreateRequest;
use App\Http\Requests\AuthorEditRequest;
use App\Http\Resources\AuthorResource;
use App\Author;

class AuthorController extends Controller
{
    public function index()
    {
        return AuthorResource::collection(Author::all());
    }

    public function show(Author $author)
    {
        return $author;
    }

    public function store(AuthorCreateRequest $request)
    {
        $author = Author::create($request->all());

        return response()->json($author, 201);
    }

    public function update(AuthorEditRequest $request, Author $author)
    {
        if ($request->has('avatar')) {
            $author->avatar = $request->avatar;
        } else $author->avatar = null;

        $author->update($request->all());

        $author->interests()->sync($request->interest_ids);

        return response()->json($author, 200);
    }

    public function destroy(Author $author)
    {
        $author->delete();

        return response()->json(null, 204);
    }

    public function getAuthorInterest($authorId)
    {
        $interest = Author::find($authorId)->interests;
        return $interest;
    }
}
