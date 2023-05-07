<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classification;

class ClassificationController extends Controller
{
    public function index()
    {
        $classifications = Classification::all();
        return view('classifications.index', compact('classifications'));
    }

    public function create()
    {
        return view('classifications.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:classifications|max:255',
            'description' => 'nullable',
        ]);

        Classification::create($request->all());

        return redirect()->route('classifications.index')
            ->with('success', 'Classification created successfully.');
    }

    public function show(Classification $classification)
    {
        return view('classifications.show', compact('classification'));
    }

    public function edit(Classification $classification)
    {
        return view('classifications.edit', compact('classification'));
    }

    public function update(Request $request, Classification $classification)
    {
        $request->validate([
            'name' => 'required|unique:classifications,name,' . $classification->id . '|max:255',
            'description' => 'nullable',
        ]);

        $classification->update($request->all());

        return redirect()->route('classifications.index')
            ->with('success', 'Classification updated successfully');
    }

    public function destroy(Classification $classification)
    {
        $classification->delete();

        return redirect()->route('classifications.index')
            ->with('success', 'Classification deleted successfully');
    }
}
