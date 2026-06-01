<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher;
use Illuminate\Support\Facades\Log;  // ← Add this line
use Illuminate\Support\Facades\DB;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $search = $request->search;
        $teachers = Teacher::when(
            $request->filled('search'),
            function ($query) use ($search) {
                $query->where('name', 'LIKE', '%' . $search . '%');
            }
        )
            ->latest()
            ->paginate(5);
        return view('admin.teacher.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.teacher.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:teachers,name',
            'subject' => 'required|string|max:255',
            'short_desc' => 'required|string|max:500',
            'logo' => 'required|mimes:jpeg,jpg,png,gif,svg|max:2048',
            'status' => 'nullable|boolean'
        ]);

        $fileName = null;

        DB::beginTransaction();

        try {
            if ($request->hasFile('logo')) {
                $file = $request->file('logo');

                if (!$file->isValid()) {
                    throw new \Exception('The uploaded file is invalid or corrupted.');
                }

                $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

                $moved = $file->move(public_path('teachers'), $fileName);

                if (!$moved) {
                    throw new \Exception('Failed to upload the image file.');
                }
            }

            $teacher = Teacher::create([
                'name' => $request->name,
                'subject' => $request->subject,
                'short_desc' => $request->short_desc,
                'image' => $fileName,
                'status' => $request->status ?? 0
            ]);

            if (!$teacher || !$teacher->id) {
                throw new \Exception('Failed to create teacher record.');
            }

            // Use DB (not \DB)
            DB::commit();

            // Use Log (not \Log)
            Log::info('Teacher created successfully', [
                'teacher_id' => $teacher->id,
                'name' => $teacher->name,
            ]);

            return redirect()
                ->route('teacher.index')
                ->with('success', 'Teacher "' . $request->name . '" has been created successfully.');
        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollBack();

            if ($fileName && file_exists(public_path('teachers/' . $fileName))) {
                unlink(public_path('teachers/' . $fileName));
            }

            if (str_contains($e->getMessage(), 'Duplicate entry')) {
                $errorMessage = 'A teacher with this name already exists.';
            } else {
                $errorMessage = 'Database error occurred. Please try again.';
            }

            // Use Log (not \Log)
            Log::error('Teacher store database error: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString(),
                'input' => $request->except('logo')
            ]);

            return redirect()
                ->back()
                ->withInput()
                ->with('error', $errorMessage);
        } catch (\Exception $e) {
            // Use DB (not \DB)
            DB::rollBack();

            if ($fileName && file_exists(public_path('teachers/' . $fileName))) {
                unlink(public_path('teachers/' . $fileName));
            }

            // Use Log (not \Log)
            Log::error('Teacher store error: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'input' => $request->except('logo')
            ]);

            $errorMessage = config('app.debug')
                ? $e->getMessage()
                : 'An error occurred while creating the teacher. Please try again.';

            return redirect()
                ->back()
                ->withInput()
                ->with('error', $errorMessage);
        }
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
        $teacher = Teacher::findorFail($id);
        return view('admin.teacher.edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $teacher = Teacher::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'subject' => 'required',
            'short_desc' => 'required',
            'logo' => 'mimes:jpeg,jpg,png,gif,svg|max:2048'
        ]);

        try {

            $fileName = $teacher->image;

            if ($request->hasFile('logo')) {

                // delete old image
                if (
                    $teacher->image &&
                    file_exists(public_path('teachers/' . $teacher->image))
                ) {
                    unlink(public_path('teachers/' . $teacher->image));
                }

                // upload new image
                $file = $request->file('logo');

                $fileName = time() . '_' . $file->getClientOriginalName();

                $file->move(public_path('teachers'), $fileName);
            }

            $teacher->update([
                'name' => $request->name,
                'subject' => $request->subject,
                'short_desc' => $request->short_desc,
                'image' => $fileName,
                'status' => $request->status
            ]);

            return redirect()
                ->route('teacher.index')
                ->with('success', 'Teacher updated successfully');
        } catch (\Exception $e) {

            return redirect()
                ->back()
                ->withInput()
                ->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {

            $teacher = Teacher::findOrFail($id);

            // delete image
            if (
                $teacher->image &&
                file_exists(public_path('teachers/' . $teacher->image))
            ) {
                unlink(public_path('teachers/' . $teacher->image));
            }

            $teacher->delete();

            return redirect()
                ->route('teacher.index')
                ->with('success', 'Teacher deleted successfully');
        } catch (\Exception $e) {

            return redirect()
                ->back()
                ->with('error', $e->getMessage());
        }
    }
}
