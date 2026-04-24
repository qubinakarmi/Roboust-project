<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ListController extends Controller
{

public function export(Request $request)
{


    return Excel::download(new \App\Exports\UsersExport, 'users.xlsx');
}
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $registers = User::when($request->filled('search'), function ($query) use ($request) {
            $query->where('name', 'LIKE', '%' . $request->search . '%');
        })->when($request->filled('status'), function ($q) use ($request) {
            $q->where('status', $request->status);
        })->latest()->paginate(5)->appends([
            'search' => $request->search,
            'status' => $request->status,
        ]);;
        return view('admin.register.index', compact('registers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $user = User::findorFail($id);
        $user->delete();
        return redirect()->route('reg.index')->with('success', 'User has been deleted');
    }
}
