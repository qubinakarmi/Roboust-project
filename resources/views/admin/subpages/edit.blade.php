@extends('admin.layouts.app2')
@section('title', 'Edit Sub Page Content')

@section('content')

    <main class="app-main">
        <div class="app-content">
            <div class="container-fluid">

                <div class="card card-info card-outline">

                    <!-- Header -->
                    <div class="card-header">
                        <h3 class="card-title">Edit Sub Page Content</h3>
                    </div>

                    <!-- Form -->
                    <form action="{{ route('subpage.update', $content->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="card-body">
                            <div class="row g-3">

                                <!-- Slider Title  -->
                                <div class="col-md-12">
                                    <label class="form-label">Title</label>
                                    <input type="text" name="title" class="form-control" placeholder="Enter title"
                                        value="{{ old('title', $content->title) }}">

                                    @error('title')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>

                              


                            


                                <div class="col-md-12">
                                    <label class="form-label">Description</label>
                                    <textarea id="editor" name="description" class="form-control" placeholder="Enter a Detail Content">{{ old('detail_content', $content->description) }}</textarea>
                                    @error('description')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>






                                <!-- Featured Image -->
                                <div class="col-md-12">
                                    <label class="form-label">Client Photo</label>
                                    <x-image />
                                    <span>current image</span>
                                    <img src="{{ asset('contents/' . $content->image) }}" alt=""
                                        style="height:200px; width:200px;">


                                    @error('logo')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror

                                </div>

                                <!-- Status -->
                                <div class="col-md-12">
                                    <label class="form-label">Status</label>
                                    <select name="status" class="form-select">
                                        <option value="1" {{ old('status', $content->status) == 1 ? 'selected' : '' }}>
                                            Published
                                        </option>
                                        <option value="0" {{ old('status', $content->status) == 0 ? 'selected' : '' }}>
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
                            <button type="submit" class="btn btn-info">Add Content</button>
                            <a href="" class="btn btn-secondary">Cancel</a>
                        </div>

                    </form>

                </div>

            </div>
        </div>
    </main>

@endsection
