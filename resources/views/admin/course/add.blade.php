@extends('admin.layouts.app2')
@section('title', 'Add Course')

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
                    <form action="{{ route('course.store') }}" method="POST" enctype="multipart/form-data"
                        data-parsley-validate novalidate>
                        @csrf

                        <div class="card-body">
                            <div class="row g-3">

                                <!-- Service Name -->
                                <div class="col-md-12">
                                    <label class="form-label">Title</label>
                                    <input type="text" name="title" class="form-control"
                                        placeholder="Enter course title" required>

                                    @error('title')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror


                                </div>



                                <div class="col-md-12">
                                    <label class="form-label">Sub Title</label>
                                    <input type="text" name="sub_title" class="form-control"
                                        placeholder="Enter sub_title" required data-parsley-type="sub_title"
                                        data-parsley-trigger="keyup" data-parsley-maxlength="25">

                                    @error('sub_title')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="col-md-12">
                                    <label class="form-label">Short Description</label>
                                    {{-- <input type="text" name="sub_desc" class="form-control"
                                        placeholder="Enter sub_desc" required data-parsley-type="sub_title"
                                        data-parsley-trigger="keyup" data-parsley-maxlength="25"> --}}

                                    <textarea name="short_desc" class="form-control"></textarea>

                                    @error('sub_title')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label">Duration</label>
                                    <input type="text" name="duration" class="form-control" placeholder="Enter duration"
                                        data-parsley-trigger="keyup" data-parsley-maxlength="25" required>

                                    @error('duration')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <label>Course Info</label>
                                    <textarea name="course_info" class="form-control editor" required>{{ old('course_info') }}</textarea>
                                </div>

                                <div class="col-md-12">
                                    <label>Career Outcome</label>
                                    <textarea name="career_outcome" class="form-control editor" required>{{ old('career_outcome') }}</textarea>
                                </div>
                                <div class="col-md-12">
                                    <label>Tool Covered</label>
                                    <textarea name="tool" class="form-control editor" required>{{ old('tool') }}</textarea>
                                </div>
                                <div class="col-md-12">
                                    <label>Certification</label>
                                    <textarea name="certification" class="form-control editor" required>{{ old('certification') }}</textarea>
                                </div>
                                    <div class="col-md-12">
                                    <label>Benefits</label>
                                    <textarea name="benefits" class="form-control editor" required>{{ old('benefits') }}</textarea>
                                </div>

                                <label > Video</label>
                                <input type="text" name="video" class="form-control">















                                <div class="col-md-12">
                                    <label class="form-label">Image</label>
                                    <x-image />


                                    @error('logo')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>



                            </div>




                            <div class="col-md-12">
                                <label>Status</label>
                                <select name="status" class="form-select">
                                    <option value="1">Published</option>
                                    <option value="0" selected>Pending</option>
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
