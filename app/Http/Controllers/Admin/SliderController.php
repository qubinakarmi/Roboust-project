<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Exports\SlidersExport;
use Illuminate\Http\Request;
use App\Models\Slider;
use Maatwebsite\Excel\Facades\Excel;

class SliderController extends Controller
{

    public function export()
    {
        return Excel::download(new SlidersExport, 'sliders.xlsx');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //

        $sliders = Slider::when($request->filled('search'), function ($query) use ($request) {
            $query->where('title', 'LIKE', '%' . $request->search . '%');
        })->when($request->filled('status'), function ($query) use ($request) {
            $query->where('status', $request->status);
        })->latest()->paginate(5)->appends([
            'search' => $request->search,
            'status' => $request->status,
        ]);

        return view('admin.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.slider.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title' => 'required',
            'sub_title' => 'required',
            'url_link' => 'required',
            'video_link' => 'required',
            'ordering' => 'required',
            'logo' => 'required|mimes:jpeg,jpg,png|max:2048',
            'status' => 'required|boolean',

        ]);


        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('sliders'), $fileName);
        }


        Slider::create(
            [
                'title' => $request->title,
                'sub_title' => $request->sub_title,
                'url_link' => $request->url_link,
                'video_link' => $request->video_link,
                'ordering' => $request->ordering,
                'image' => $fileName,
                'status' => $request->status,

            ]

        );

        return redirect()->route('slider.index')->with('success', 'Slider Registered Successfully');
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
        $slider = Slider::findorFail($id);
        return view('admin.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //



        $request->validate([
            'title' => 'required',
            'sub_title' => 'required',
            'url_link' => 'required',
            'video_link' => 'required',
            'ordering' => 'required',
            'logo' => 'nullable|mimes:jpeg,jpg,png|max:2048',
            'status' => 'required|boolean',

        ]);
        $slider = Slider::findorFail($id);
        $data = [
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'url_link' => $request->url_link,
            'video_link' => $request->video_link,
            'ordering' => $request->ordering,
            'status' => $request->status,
        ];


        if ($request->hasFile('logo')) {

            // delete old image (recommended)
            if ($slider->image && file_exists(public_path('sliders/' . $slider->image))) {
                unlink(public_path('sliders/' . $slider->image));
            }

            $file = $request->file('logo');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('sliders'), $fileName);

            $data['image'] = $fileName; // 
        }

        $slider->update($data);

        return redirect()->route('slider.index')->with('success', 'Slider Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $sliders = Slider::findorFail($id);
        if ($sliders->image && file_exists(public_path('sliders/' . $sliders->image))) {
            unlink(public_path('sliders/' . $sliders->image));
        }
        $sliders->delete();

        return redirect()->route('slider.index')->with('success', 'Slider deleted successfully');
    }
}
