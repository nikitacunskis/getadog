<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pet;
use App\Models\Category;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $pets = Pet::with('category')->get();

        return response()->json($pets);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function create()
    {
        $categories = Category::all();

        return response()->json($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $pet = new Pet;
        $pet->name = $request->name;
        $pet->age = $request->age;
        $pet->category_id = $request->category_id;
        $pet->save();

        return response()->json($pet);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pet  $pet
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Pet $pet)
    {
        $pet->load('category');

        return response()->json($pet);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pet  $pet
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit(Pet $pet)
    {
        $categories = Category::all();

        return response()->json([
            'pet' => $pet,
            'categories' => $categories,
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
        $pet->name = $request->name;
        $pet->age = $request->age;
        $pet->category_id = $request->category_id;
        $pet->save();

        return response()->json($pet);
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

        return response()->json(['message' => 'Pet deleted successfully.']);
    }
}
