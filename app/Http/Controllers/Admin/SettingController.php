<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Setting;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $settings = Setting::all()->pluck('value', 'key');

        return view('admin.settings.add', compact('settings'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Fetch all settings as key => value

    }

    /**
     * Store a newly created resource in storage.
     */





    public function store(Request $request)
    {
        $allSettings = $request->validate([
            'title'    => 'string',
            'logo'     => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'location' => 'string',
            'contact'  => 'string',
            'email'=>'string'
         
        ]);

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $fileName = $file->getClientOriginalExtension(); // use original file name
            $file->move(public_path('settings'), $fileName);
            $allSettings['logo'] = $fileName; //store in database

        }

        // Save settings (key-value)
        foreach ($allSettings as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        return redirect()->back()->with('success', 'Settings saved successfully!');
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
    }
}
