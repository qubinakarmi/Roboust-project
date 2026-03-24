<?php

namespace App\Http\Controllers;

use App\Models\Counter;

use Illuminate\Http\Request;

class CounterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    {
        $counters = Counter::paginate(5);
        return view('admin.counter.index', compact('counters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.counter.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $counter = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'number' => 'required',
            'prefix' => 'required',
            'suffix' => 'required',
            'icon' => 'required',
            'status' => 'required',
        ]);




        Counter::create($counter);
        return redirect()->route('counter.index')->with('success', 'Counter has been registered');
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
        $counters = Counter::findorFail($id);
        return view('admin.counter.edit', compact('counters'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $counter = Counter::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'number' => 'required',
            'prefix' => 'required',
            'suffix' => 'required',
            'icon' => 'required',
            'status' => 'required',
        ]);

        $counter->update($validated);

        return redirect()->route('counter.index')
            ->with('success', 'Counter updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $counter = Counter::findorFail($id);
        echo $id;
        $counter->delete();
        return redirect()->back()->with('success', 'Counter has been deleted');
    }
}
