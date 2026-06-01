<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;
use Exception;

class AboutUsController extends Controller
{
    public function index()
    {
        try {
            $abouts = AboutUs::paginate(5);
            return view('admin.about.index', compact('abouts'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function create()
    {
        return view('admin.about.add');
    }

    public function store(Request $request)
    {
        try {

            $request->validate([
                'title' => 'required',
                'sub_title' => 'required',
                'detail_content' => 'required',
                'mission_title' => 'required',
                'mission_content' => 'required',
                'location_title' => 'required',
                'location_content' => 'required',
                'logo' => 'required|mimes:jpeg,png,jpg,webp|max:2048',
            ]);

            $fileName = null;

            if ($request->hasFile('logo')) {

                $file = $request->file('logo');

                $fileName = time() . '.' . $file->getClientOriginalExtension();

                $file->move(public_path('abouts'), $fileName);
            }

            AboutUs::create([
                'title' => $request->title,
                'sub_title' => $request->sub_title,
                'detail_content' => $request->detail_content,
                'mission_title' => $request->mission_title,
                'mission_content' => $request->mission_content,
                'location_title' => $request->location_title,
                'location_content' => $request->location_content,
                'image' => $fileName, // DB column = image
            ]);

            return redirect()->route('about.index')
                ->with('success', 'About Us created successfully!');

        } catch (Exception $e) {

            return redirect()->back()
                ->withInput()
                ->with('error', $e->getMessage());
        }
    }

    public function show(string $id)
    {
        $about = AboutUs::findOrFail($id);
        return view('admin.about.show', compact('about'));
    }

    public function edit(string $id)
    {
        try {
            $about = AboutUs::findOrFail($id);
            return view('admin.about.edit', compact('about'));
        } catch (Exception $e) {
            return redirect()->route('about.index')
                ->with('error', $e->getMessage());
        }
    }

    public function update(Request $request, string $id)
    {
        try {

            $request->validate([
                'title' => 'required',
                'sub_title' => 'required',
                'detail_content' => 'required',
                'mission_title' => 'required',
                'mission_content' => 'required',
                'location_title' => 'required',
                'location_content' => 'required',
                'logo' => 'nullable|mimes:jpeg,png,jpg,webp|max:2048',
            ]);

            $about = AboutUs::findOrFail($id);

            $data = [
                'title' => $request->title,
                'sub_title' => $request->sub_title,
                'detail_content' => $request->detail_content,
                'mission_title' => $request->mission_title,
                'mission_content' => $request->mission_content,
                'location_title' => $request->location_title,
                'location_content' => $request->location_content,
            ];

            // ✅ LOGO UPDATE FIXED
            if ($request->hasFile('logo')) {

                if ($about->image && file_exists(public_path('abouts/' . $about->image))) {
                    unlink(public_path('abouts/' . $about->image));
                }

                $file = $request->file('logo');

                $fileName = time() . '.' . $file->getClientOriginalExtension();

                $file->move(public_path('abouts'), $fileName);

                $data['image'] = $fileName;
            }

            $about->update($data);

            return redirect()->route('about.index')
                ->with('success', 'About Us updated successfully!');

        } catch (Exception $e) {

            return redirect()->back()
                ->withInput()
                ->with('error', $e->getMessage());
        }
    }

    public function destroy(string $id)
    {
        try {

            $about = AboutUs::findOrFail($id);

            if ($about->image && file_exists(public_path('abouts/' . $about->image))) {
                unlink(public_path('abouts/' . $about->image));
            }

            $about->delete();

            return redirect()->route('about.index')
                ->with('success', 'About Us deleted successfully!');

        } catch (Exception $e) {

            return redirect()->back()
                ->with('error', $e->getMessage());
        }
    }
}