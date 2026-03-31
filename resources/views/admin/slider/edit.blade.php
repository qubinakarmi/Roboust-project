@extends('admin.layouts.app2')
@section('title', 'Add Slider')

@section('content')

    <main class="app-main">
        <div class="app-content">
            <div class="container-fluid">

                <div class="card card-info card-outline">

                    <!-- Header -->
                    <div class="card-header">
                        <h3 class="card-title">Add New Slider</h3>
                    </div>

                    <!-- Form -->
                    <form action="{{ route('slider.update',$slider->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="card-body">
                            <div class="row g-3">

                                <!-- Slider Title  -->
                                <div class="col-md-12">
                                    <label class="form-label">Title</label>
                                    <input type="text" name="title" class="form-control" placeholder="Enter title" value="{{ old('title',$slider->title) }}">

                                    @error('title')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Slider Title  -->
                                <div class="col-md-12">
                                    <label class="form-label">Sub Title</label>
                                    <input type="text" name="sub_title" class="form-control"
                                        placeholder="Enter sub title"  value="{{ old('sub_title',$slider->sub_title) }}">

                                    @error('sub_title')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="col-md-12">
                                    <label class="form-label">Url Link</label>
                                    <input type="text" name="url_link" class="form-control"
                                        placeholder="Enter url link " value="{{ old('url_link',$slider->url_link) }}">

                                    @error('url_link')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label">Video Link</label>
                                    <input type="text" name="video_link" class="form-control"
                                        placeholder="Enter video link " value="{{ old('video_link',$slider->video_link) }}">

                                    @error('video_link')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label">Ordering</label>
                                    <input type="text" name="ordering" class="form-control" placeholder="Enter Ordering" value="{{ old('ordering',$slider->ordering) }}">

                                    @error('ordering')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>


                               <!-- Featured Image -->
                                <div class="col-md-12">
                                    <label class="form-label">Client Photo</label>
                                    <x-image />
                                    <span>current image</span>
                                    <img src="{{ asset('sliders/' . $slider->image) }}" alt=""
                                        style="height:200px; width:200px;">


                                    @error('logo')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror

                                </div>

                                <!-- Status -->
                                <div class="col-md-12">
                                    <label class="form-label">Status</label>
                                    <select name="status" class="form-select">
                                        <option value="1" {{ old('status', $slider->status) == 1 ? 'selected' : '' }}>
                                            Published
                                        </option>
                                        <option value="0" {{ old('status', $slider->status) == 0 ? 'selected' : '' }}>
                                            Hidden
                                        </option>
                                    </select>


                                    @error('status')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>






                            </div>
                        </div>

                        <!-- Footer -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-info">Update Slider</button>
                            <a href="{{ route('slider.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>

                    </form>

                </div>

            </div>
        </div>
    </main>

@endsection
