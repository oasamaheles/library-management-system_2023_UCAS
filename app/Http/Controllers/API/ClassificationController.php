<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Classification;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ClassificationController extends Controller
{
    /**
     * Display a listing of the classifications.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classifications = Classification::all();

        return response()->json($classifications);
    }

    /**
     * Store a newly created classification in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255',
        ]);

        $classification = Classification::create($validatedData);

        return response()->json($classification, Response::HTTP_CREATED);
    }

    /**
     * Display the specified classification.
     *
     * @param  \App\Models\Classification  $classification
     * @return \Illuminate\Http\Response
     */
    public function show(Classification $classification)
    {
        return response()->json($classification);
    }

    /**
     * Update the specified classification in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Classification  $classification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Classification $classification)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255',
        ]);

        $classification->update($validatedData);

        return response()->json($classification);
    }

    /**
     * Remove the specified classification from storage.
     *
     * @param  \App\Models\Classification  $classification
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classification $classification)
    {
        $classification->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
