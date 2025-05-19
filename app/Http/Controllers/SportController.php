<?php

namespace App\Http\Controllers;

use App\Models\Sport;
use Illuminate\Http\Request;

class SportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sports = Sport::all();
        return view('sports.index', compact('sports'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

          $validated = $request->validate([
              'name' => 'required|max:255',
              'image' => 'nullable|image', // If you handle file uploads
              'location' => 'required|max:255',
              'description' => 'required',
              'price' => 'nullable|numeric',
              'date_available' => 'nullable|date',
              'type' => 'nullable|max:255',
              'contact_info' => 'nullable|max:255',
          ]);

          // Handle image upload if present
          if ($request->hasFile('image')) {
              $validated['image'] = $request->file('image')->store('sports', 'public');
          }

          // If you have user authentication
          if (auth()->check()) {
              $validated['user_id'] = auth()->id();
          }

          Sport::create($validated);

          // For web app:
          // return redirect()->route('sports.index')
          //    ->with('success', 'Sport created successfully.');

          // For API:
           return response()->json(['message' => 'Sport created successfully.'], 201);


    }

    /**
     * Display the specified resource.
     */
    public function show(Sport $sport)
    {
      $sport = Sport::find($id);
      return view('sports.show', compact('sport'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'image' => 'nullable|image',
            'location' => 'required|max:255',
            'description' => 'required',
            'price' => 'nullable|numeric',
            'date_available' => 'nullable|date',
            'type' => 'nullable|max:255',
            'contact_info' => 'nullable|max:255',
        ]);

        $sport = Sport::findOrFail($id);

        // Handle image upload if present
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('sports', 'public');
        }

        $sport->update($validated);

        return redirect()->route('sports.index')
            ->with('success', 'Sport updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sport $sport)
    {
        $sport = Sport::findOrFail($sport->id);
        $sport->delete();
        return redirect()->route('sports.index')
        ->with('success', 'Sport deleted successfully.');
    }
}
