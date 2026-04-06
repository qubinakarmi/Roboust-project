@extends('admin.layouts.app2')
@section('title', 'Edit Page Content')

@section('content')

    <main class="app-main">
        <div class="app-content">
            <div class="container-fluid">

                <div class="card card-info card-outline">

                    <!-- Header -->
                    <div class="card-header">
                        <h3 class="card-title">Edit Page Content</h3>
                    </div>

                    <!-- Form -->
                    <form action="{{ route('page.update', $page->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="card-body">
                            <div class="row g-3">

                                <!-- Slider Title  -->
                                <div class="col-md-12">
                                    <label class="form-label">Title</label>
                                    <input type="text" name="title" class="form-control" placeholder="Enter title"
                                        value="{{ old('title', $page->title) }}">

                                    @error('title')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Slider Title  -->
                                <div class="col-md-12">
                                    <label class="form-label">Sub Title</label>
                                    <input type="text" name="sub_title" class="form-control"
                                        placeholder="Enter sub title" value="{{ old('sub_title', $page->sub_title) }}">

                                    @error('sub_title')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="col-md-12">
                                    <label class="form-label">Short Content</label>
                                    <textarea name="short_content" class="form-control" placeholder="Enter a Short Content">{{ old('short_content', $page->short_content) }}</textarea>
                                    @error('short_content')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="col-md-12">
                                    <label class="form-label">Detail Content</label>
                                    <textarea name="detail_content" class="form-control" placeholder="Enter a Detail Content">{{ old('detail_content', $page->detail_content) }}</textarea>
                                    @error('detail_content')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>






                                <!-- Featured Image -->
                                <div class="col-md-12">
                                    <label class="form-label">Client Photo</label>
                                    <x-image />
                                    <span>current image</span>
                                    <img src="{{ asset('pages/' . $page->image) }}" alt=""
                                        style="height:200px; width:200px;">


                                    @error('logo')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror

                                </div>


                                {{-- //Start of meta  --}}
                                <div class="col-md-12">
                                    <label class="form-label">Meta Title</label>
                                    <input type="text" name="meta_title" class="form-control"
                                        placeholder="Enter blog meta_title"
                                        value="{{ old('meta_title', $page->meta_title) }}">

                                    @error('meta_title')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label">Meta Keyword</label>

                                    {{-- Hidden input for tagsManager --}}
                                    <input type="hidden" name="hidden_tags" id="hidden_tags" />

                                    {{-- Visible input for user --}}
                                    <input type="text" class="tm-input form-control" id="tags_input"
                                        placeholder="Enter tags">

                                    @error('hidden_tags')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                    <small id="tag-error" style="color:red;"></small>
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label">Meta Description</label>
                                    <textarea name="meta_description" class="form-control" id="editor">{{ old('meta_description', $page->meta_description) }}</textarea>

                                    @error('meta_description')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>



                                <div class="col-md-12">
                                    <label class="form-label">Meta Photo</label>
                                    <x-meta_image />
                                    <span>current image</span>
                                    <img src="{{ asset('meta_pages/' . $page->meta_image) }}" alt=""
                                        style="height:200px;width:400px;">


                                    @error('meta_image')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror

                                </div>


                                {{-- end of meta --}}






                                <!-- Status -->
                                <div class="col-md-12">
                                    <label class="form-label">Status</label>
                                    <select name="status" class="form-select">
                                        <option value="1" {{ old('status', $page->status) == 1 ? 'selected' : '' }}>
                                            Published
                                        </option>
                                        <option value="0" {{ old('status', $page->status) == 0 ? 'selected' : '' }}>
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
                            <button type="submit" class="btn btn-info">Update Content</button>
                            <a href="" class="btn btn-secondary">Cancel</a>
                        </div>

                    </form>

                </div>

            </div>
        </div>
    </main>

@endsection
