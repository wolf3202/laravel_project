<?php

namespace App\Http\Controllers;

use App\Http\Requests\InterestCreateRequest;
use App\Http\Requests\InterestEditRequest;
use App\Http\Resources\InterestResource;
use App\Interest;

class InterestController extends Controller
{
    public function index()
    {
        return InterestResource::collection(Interest::all());
    }

    public function show(Interest $interest)
    {
        return $interest;
    }

    public function store(InterestCreateRequest $request)
    {
        $interest = Interest::create($request->all());

        return response()->json($interest, 201);
    }

    public function update(InterestEditRequest $request, Interest $interest)
    {
        $interest->update($request->all());

        return response()->json($interest, 200);
    }

    public function destroy(Interest $interest)
    {
        $interest->delete();

        return response()->json(null, 204);
    }

    public function getInterestAuthor($interestId)
    {
        $author = Interest::find($interestId)->authors;
        return $author;
    }
}
