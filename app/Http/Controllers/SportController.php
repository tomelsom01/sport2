<?php

namespace App\Http\Controllers;

use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
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
    public function create()
    {
      return view('sports.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    \Log::info('Store method hit');

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

    // Handle image upload to Cloudinary if present
   if ($request->hasFile('image')) {
    \Log::info('Image file present');
    if ($request->file('image')->isValid()) {
        \Log::info('Image file is valid');
        $imageFile = $request->file('image');
        \Log::info('Real path: ' . $imageFile->getRealPath());

        try {
            $result = Cloudinary::upload($imageFile->getRealPath());
            \Log::info('Cloudinary upload result:', ['result' => $result]);
            $uploadedFileUrl = $result->getSecurePath();
            $validated['image'] = $uploadedFileUrl;
        } catch (\Exception $e) {
            \Log::error('Cloudinary upload failed: ' . $e->getMessage());
        }
    } else {
        \Log::warning('Image file is not valid');
    }
} else {
    \Log::warning('No image file present');
}




    // Attach user ID if authenticated
    if (auth()->check()) {
        $validated['user_id'] = auth()->id();
    }

    $sport = Sport::create($validated);

    if ($sport) {
        return redirect()->route('sports.index')
            ->with('success', 'Sport created successfully.');
    } else {
        return redirect()->back()
            ->with('error', 'Sport not created successfully. Please try again.');
    }
}

    /**
     * Display the specified resource.
     */
    public function show(Sport $sport)
{
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
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
        $uploaded = Cloudinary::upload($request->file('image')->getRealPath());
        $validated['image'] = $uploaded->getSecurePath();
     }

        $sport->update($validated);

        return redirect()->route('sports.index')
            ->with('success', 'Sport updated successfully.');
    }

    public function edit($id)
{
    $sport = Sport::findOrFail($id);
    return view('sports.edit', compact('sport')); // This shows the edit form
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
