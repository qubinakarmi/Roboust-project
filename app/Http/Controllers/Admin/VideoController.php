<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video;
class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //        
        $search = $request->search;

        $videos=Video::when(
            $request->filled('search'),
            function ($query) use ($search) {
                $query->where('title', 'LIKE', '%' . $search . '%');
            }
        )
            ->latest()
            ->paginate(2);
        return view('admin.video.index',compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //


                return view('admin.video.add');

    }

    /**
     * Store a newly created resource in storage.
     */
     public function store(Request $request)
    {
        //

        $request->validate([
            'title' => 'required',
            'logo' => 'mimes:jpeg,jpg,png,gif,svg|max:2048'
            
        ]);


        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('videos'), $fileName);
        }


        Video::create([

            'title' => $request->title,
            'video_url' => $request->video_url,
            'thumbnail' => $fileName,
            'status' => $request->status

        ]);

        return redirect()->route('video.index')->with('success', 'video has been created successfully');
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
        $video = Video::findorFail($id);
        return view('admin.video.edit', compact('video'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //


        $video = Video::findorFail($id);
           $request->validate([
            'title' => 'required',
            'logo' => 'mimes:jpeg,jpg,png,gif,svg|max:2048'
            
        ]);



        $fileName = $video->thumbnail;
        if ($request->hasFile('logo')) {

            // delete old image
            if ($video->image && file_exists(public_path('videos/' . $video->image))) {
                unlink(public_path('videos/' . $video->image));
            }

            // upload new image
            $file = $request->file('logo');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('videos'), $fileName);
        }


        $video->update([

             'title' => $request->title,
            'video_url' => $request->video_url,
            'thumbnail' => $fileName,
            'status' => $request->status

        ]);

        return redirect()->route('video.index')->with('success', 'video has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

        $video = Video::findOrFail($id);

        // delete image
        if ($video->image && file_exists(public_path('videos/' . $video->image))) {
            unlink(public_path('videos/' . $video->image));
        }

        $video->delete();

        return redirect()->route('video.index')
            ->with('success', 'video has been deleted successfully');
    }
}