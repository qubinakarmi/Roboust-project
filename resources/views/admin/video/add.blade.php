@extends('admin.layouts.app2')
@section('title', 'Add Video')

@section('content')

    <main class="app-main">
        <div class="app-content">
            <div class="container-fluid">

                <div class="card card-info card-outline">

                    <!-- Header -->
                    <div class="card-header">
                        <h3 class="card-title">Add New Video</h3>
                    </div>

                    <!-- Form -->
                    <form action="{{ route('video.store') }}" method="POST" enctype="multipart/form-data"
                        data-parsley-validate novalidate>
                        @csrf

                        <div class="card-body">
                            <div class="row g-3">

                                <div class="col-md-12">
                                    <label class="form-label">Title</label>
                                    <input type="text" name="title" class="form-control"
                                        placeholder="Enter video title" required>

                                    @error('title')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror


                                </div>



          














                                <div class="col-md-12">
                                    <label class="form-label">Thumbnail Image</label>
                                    <x-image />


                                    @error('logo')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>



                            </div>


                                 <div class="col-md-12">
                                    <label class="form-label">Video link</label>
                                    <input type="text" name="video_url" class="form-control"
                                        placeholder="Enter video link" required>

                                    @error('video_link')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror


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
