<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Inertia\Inertia;

class CategoryController extends Controller
{
    // ...
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        
        return Inertia::render('Dashboard/Category/Index', [
            'category' => $categories,
        ]);
    }

    public function create() {
        return Inertia::render('Dashboard/Category/Create');
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

        $category = Category::create($request->all());

        return Inertia::render('Dashboard/Category/Create', [
            'message' => 'Category created successfully',
            'category' => $category,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return Inertia::render('Dashboard/Category/Read', [
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|unique:categories|max:255',
        ]);

        $category->update($request->all());

        return Inertia::render('Dashboard/Category/Update', [
            'message' => 'Category updated successfully',
            'category' => $category,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return Inertia::render('Dashboard/Category/Index', [
            'message' => 'Category deleted successfully'
        ]);
    }
}
