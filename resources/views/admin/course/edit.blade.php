@extends('admin.layouts.app2')
@section('title', 'Edit Course')

@section('content')

    <main class="app-main">
        <div class="app-content">
            <div class="container-fluid">

                <div class="card card-info card-outline">

                    <!-- Header -->
                    <div class="card-header">
                        <h3 class="card-title">Add New Course</h3>
                    </div>

                    <!-- Form -->
                    <form action="{{ route('course.update', $course->id) }}" method="POST" enctype="multipart/form-data"
                        data-parsley-validate novalidate>
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="row g-3">

                                <!-- Service Name -->
                                <div class="col-md-12">
                                    <label class="form-label">Title</label>
                                    <input type="text" name="title" class="form-control"
                                        placeholder="Enter course title" required value="{{ old('title', $course->title) }}">

                                    @error('title')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror


                                </div>



                                <div class="col-md-12">
                                    <label class="form-label">Sub Title</label>
                                    <input type="text" name="sub_title" class="form-control"
                                        placeholder="Enter sub_title" required data-parsley-type="sub_title"
                                        data-parsley-trigger="keyup" data-parsley-maxlength="25"
                                        value="{{ old('sub_title', $course->sub_title) }}">

                                    @error('sub_title')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label">duration</label>
                                    <input type="text" name="duration" class="form-control" placeholder="Enter duration"
                                        data-parsley-trigger="keyup" data-parsley-maxlength="25" required
                                        value="{{ old('duration', $course->duration) }}">

                                    @error('duration')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">Short Description</label>
                                    <textarea name="short_desc" placeholder="Enter your short_desc" class="form-control" required
                                        data-parsley-trigger="keyup" data-parsley-maxlength="120"> {{ $course->short_desc }}</textarea>


                                    @error('short_desc')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>













                                <div class="col-md-12">
                                    <label class="form-label">Image</label>
                                    <x-image />


                                    @error('logo')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror


                                    <p>
                                        Current Image
                                    </p>

                                    <img src="{{ asset('courses/' . $course->image) }}" alt=""
                                        style="height: 200px; width:300xp;">
                                </div>



                            </div>




                            <div class="col-md-12">
                                <label>Status</label>
                                <select name="status" class="form-select">
                                    <option value="1" {{ old('status', $course->status) == 1 ? 'selected' : '' }}>
                                        Published</option>
                                    <option value="0" {{ old('status', $course->status) == 0 ? 'selected' : '' }}>Pending
                                    </option>
                                </select>
                            </div>
                        </div>

                        <!-- Footer -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-info">Add Course</button>
                            <a href="{{ route('course.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>

                    </form>

                </div>

            </div>
        </div>
    </main>

@endsection
