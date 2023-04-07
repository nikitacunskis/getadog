<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pet;
use App\Models\Category;
use App\Models\PetImage;
use Illuminate\Support\Facades\Storage;
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
        $categories = Category::all();
        return Inertia::render('Dashboard/Pets/Create', [
            'categories' => $categories,
        ]);
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
            'category_id' => ['required', 'integer'],
        ]);

        Pet::create($validatedData);

        return redirect()->route('pets.index');
    }

    public function edit(Pet $pet)
    {
        $categories = Category::all();
        $images = PetImage::all()->where('pet_id', $pet->id);
        return Inertia::render('Dashboard/Pets/Edit', [
            'pet' => $pet,
            'categories' => $categories,
            'images' => $images,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pet  $pet
     * @return \Illuminate\Http\Response
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
            'category_id' => ['required', 'integer'],
        ]);
    
        $pet->update($validatedData);
    
        return redirect()->route('pets.index', $pet);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pet $pet)
    {
        $pet->delete();

        return redirect()->route('pets.index', $pet);
    }

    public function list(string $category) 
    {
        $petsCategory = Category::where('tag', $category)->first();
        $pets = Pet::where('status', 'open')->where('category_id', $petsCategory->id)->get();
        $pets->load('petImage');

        return response()->json($pets);
    }
    
    public function upload(Request $request) {

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = 'pet' . $request->input('id') . '_' . $file->getClientOriginalName();
            $file->storeAs('public/uploads', $fileName); // store the file in the public/uploads directory
    
            PetImage::create([
                'pet_id' => $request->input('id'),
                'url' => $fileName,
            ]);
            
            return response()->json([
                'message' => 'File uploaded successfully',
                'file' => $fileName
            ]);
        }
    
        return response()->json([
            'message' => 'No file uploaded'
        ], 400);
    }
    
    public function deleteImage(string $filename)
    {
        $filePath = 'uploads/' . $filename; // assuming the file is stored in the public/uploads directory
    
        if (Storage::disk('public')->exists($filePath)) {
            Storage::disk('public')->delete($filePath);

            
            $images = PetImage::all()->where('url', $filename);
            foreach($images as $image) 
            {
                $image->delete();
            }

            return response()->json([
                'message' => 'File deleted successfully'
            ], 200);
        } else {
            return response()->json([
                'message' => 'File not found'
            ], 404);
        }
    }
}