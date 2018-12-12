<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interest;

class InterestController extends Controller
{
    public function index()
    {
        return Interest::all();
    }

    public function show(Interest $interest)
    {
        return $interest;
    }

    public function store(Request $request)
    {
        $interest = Interest::create($request->all());

        return response()->json($interest, 201);
    }

    public function update(Request $request, Interest $interest)
    {
        $interest->update($request->all());


        return response()->json($interest, 200);
    }

    public function delete(Interest $interest)
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
