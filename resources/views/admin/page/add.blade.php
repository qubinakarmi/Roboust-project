@extends('admin.layouts.app2')
@section('title', 'Add Slider')

@section('content')

    <main class="app-main">
        <div class="app-content">
            <div class="container-fluid">

                <div class="card card-info card-outline">

                    <!-- Header -->
                    <div class="card-header">
                        <h3 class="card-title">Add New Content</h3>
                    </div>

                    <!-- Form -->
                    <form action="{{ route('page.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="card-body">
                            <div class="row g-3">

                                <!-- Slider Title  -->
                                <div class="col-md-12">
                                    <label class="form-label">Title</label>
                                    <input type="text" name="title" class="form-control" placeholder="Enter title"
                                        value="{{ old('title') }}">

                                    @error('title')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Slider Title  -->
                                <div class="col-md-12">
                                    <label class="form-label">Sub Title</label>
                                    <input type="text" name="sub_title" class="form-control"
                                        placeholder="Enter sub title" value="{{ old('sub_title') }}">

                                    @error('sub_title')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="col-md-12">
                                    <label class="form-label">Short Content</label>
                                    <textarea name="short_content" class="form-control" placeholder="Enter a Short Content">{{ old('short_content') }}</textarea>
                                    @error('short_content')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="col-md-12">
                                    <label class="form-label">Detail Content</label>
                                    <textarea name="detail_content" class="form-control" placeholder="Enter a Detail Content">{{ old('detail_content') }}</textarea>
                                    @error('detail_content')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>






                                <!-- Slider Image -->
                                <div class="col-md-12">
                                    <label class="form-label">Image</label>
                                    <x-image action="" />

                                    @error('logo')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>




                        {{-- //Start of meta  --}}


                                <div class="col-md-12">
                                    <label class="form-label">Meta Title</label>
                                    <input type="text" name="meta_title" class="form-control"
                                        placeholder="Enter blog meta_title" value="{{ old('meta_title') }}">



                                    @error('meta_title')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>



                                <div class="col-md-12">
                                    <label class="form-label">Meta Keyword</label>
                                    <!-- Hidden input (NO tm-input class) -->
                                    <input type="hidden" name="hidden_tags" id="hidden_tags" />

                                    <!-- Visible input -->
                                    <input type="text" id="tags_input" class="form-control" placeholder="Enter tags">

                                    @error('hidden_tags')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                    <small id="tag-error" style="color:red;"></small>
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label">Meta Description</label>

                                    <textarea name="meta_description" class="form-control" id="editor">{{ old('meta_description') }}</textarea>

                                    @error('meta_description')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="col-md-12">
                                    <label class="form-label">Meta Image</label>
                                    <!-- Drag & Drop Area -->
                                    <x-meta_image />

                                    @error('meta_image')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror

                                </div>
                                {{-- end of meta --}}





                                <div class="col-md-12">
                                    <label class="form-label">Status</label>

                                    <select name="status" id="" class="form-control">

                                        <option value="1">Published</option>
                                        <option value="0">Hidden</option>

                                    </select>



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
