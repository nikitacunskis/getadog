<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pet;
use App\Models\Category;
use App\Models\PetImage;
use Inertia\Inertia;

class PetController extends Controller
{
    public function index()
    {
        $pets = Pet::all();

        return Inertia::render('Dashboard/Pets/Index', [
            'pets' => $pets,
        ]);
    }

    public function create()
    {
        return Inertia::render('Dashboard/Pets/Create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'age' => ['required', 'integer'],
            'size' => ['required', Rule::in(['S', 'M', 'L'])],
            'breed' => ['required', 'string', 'max:255'],
            'gender' => ['required', Rule::in(['M', 'F'])],
            'child' => ['nullable', 'boolean'],
            'cats' => ['nullable', 'boolean'],
            'other_boys' => ['nullable', 'boolean'],
            'other_girls' => ['nullable', 'boolean'],
            'birds' => ['nullable', 'boolean'],
            'stealing' => ['nullable', 'boolean'],
            'demolition' => ['nullable', 'boolean'],
            'activity' => ['nullable', Rule::in(['Low', 'Middle', 'High'])],
            'temperament' => ['nullable', Rule::in(['Introvert', 'Extrovert'])],
            'city' => ['nullable', 'boolean'],
            'commands' => ['nullable', 'string'],
            'loyal' => ['nullable', Rule::in(['Low', 'Middle', 'High'])],
            'alone' => ['nullable', 'integer'],
        ]);

        Pet::create($validatedData);

        return redirect()->route('pets.index');
    }

    public function edit(Pet $pet)
    {
        $images = PetImage::where('pet_id', $pet->id);
        return Inertia::render('Dashboard/Pets/Edit', [
            'pet' => $pet,
            'images' => $images,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pet  $pet
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Pet $pet)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'age' => 'required|integer',
            'size' => 'required|in:S,M,L',
            'breed' => 'required|string',
            'gender' => 'required|in:M,F',
            'child' => 'required|boolean',
            'cats' => 'required|boolean',
            'other_boys' => 'required|boolean',
            'other_girls' => 'required|boolean',
            'birds' => 'required|boolean',
            'stealing' => 'required|boolean',
            'demolition' => 'required|boolean',
            'activity' => 'required|in:Low,Middle,High',
            'temperament' => 'required|in:Introvert,Extrovert',
            'city' => 'required|boolean',
            'commands' => 'nullable|string',
            'loyal' => 'required|in:Low,Middle,High',
            'alone' => 'nullable|integer',
        ]);
    
        $pet->update($validatedData);
    
        return redirect()->route('pets.index', $pet);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pet  $pet
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Pet $pet)
    {
        $pet->delete();

        return redirect()->route('pets.index', $pet);
    }

    public function list(string $category) 
    {
        $petsCategory = Category::where('name', $category)->first();
        $pets = Pet::where('status', 'open')->where('category_id', $petsCategory->id)->get();

        return response()->json($pets);
    }
    
    public function upload(Request $request) {
        dd($request);
        $path = $request->file('file')->store('uploads');
      
        $photo = new PetImage();
        $photo->url = Storage::url($path);
        $photo->pet_id = $request->input('pet_id');
        $photo->save();
      
        return redirect()->route('pets.edit', $pet);
      }
}
