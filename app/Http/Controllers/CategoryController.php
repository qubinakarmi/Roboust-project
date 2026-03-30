<?php

namespace App\Http\Controllers;

use App\Exports\CategoriesExport;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;
use Maatwebsite\Excel\Facades\Excel;

class CategoryController extends Controller
{

public function export()
{
    return Excel::download(new CategoriesExport,'category.xlsx');
}
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)

    {
        $categories = Category::when($request->filled('search'),function($query) use($request){
            $query->where('name','LIKE','%'.$request->search.'%');
        })->paginate(5);
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.category.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            'category' => 'required',

        ]);

        Category::create([
            'name' => $request->category,
            'slug' => Str::Slug($request->category, '-'),
        ]);

        return redirect()->route('category.index')->with('success', 'Category has been registered');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

        $category = Category::findorFail($id);
        $category->delete();

        return redirect()->route('category.index')->with('success', 'Category has been deleted');
    }
}
