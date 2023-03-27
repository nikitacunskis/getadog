<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pet;
use App\Models\Category;
use Inertia\Inertia;

class PetController extends Controller
{
    // ...
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pets = Pet::all();
        
        return Inertia::render('Dashboard/Pets/Index', [
            'pets' => $pets,
        ]);
    }

    public function list() 
    {
        $pets = Pet::all();
        
        return response()->json([
            'pets' => $pets,
        ], 204);
    }

    public function create() {
        $categories = Category::all();
        return Inertia::render('Dashboard/Pets/Create', [
            'categories' => $categories,
        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories|max:255',
        ]);

        $pets = Pets::create($request->all());

        return Inertia::render('Dashboard/Pets/Create', [
            'message' => 'Pet created successfully',
            'pet' => $pet,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Pet $pets)
    {
        return Inertia::render('Dashboard/Pets/Read', [
            'pet' => $pet,
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
        $request->validate([
            'name' => 'required|unique:categories|max:255',
        ]);

        $pet->update($request->all());

        return Inertia::render('Dashboard/Pets/Update', [
            'message' => 'Pet updated successfully',
            'pet' => $pet,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $pet)
    {
        $pet->delete();

        return response()->json([
            'message' => 'Pet deleted successfully',
        ], 204);
    }
    
}
