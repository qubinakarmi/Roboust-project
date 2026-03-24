@extends('admin.layouts.app2')
@section('title', 'Edit Blog')

@section('content')

    <main class="app-main">
        <div class="app-content">
            <div class="container-fluid">

                <div class="card card-info card-outline">

                    <!-- Header -->
                    <div class="card-header">
                        <h3 class="card-title">Add New Blog</h3>
                    </div>
                    <!-- Form -->
                    <form action="{{ route('blog.update', $datas->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="card-body">
                            <div class="row g-3">

                                <!-- Category -->
                                <select name="author_id" class="form-control mb-2">
                                    <option value="">Select Author</option>
                                    @foreach ($authors as $author)
                                        <option value="{{ $author->id }}"
                                            {{ old('author_id', $datas->author_id) == $author->id ? 'selected' : '' }}>
                                            {{ $author->name }}
                                        </option>
                                    @endforeach
                                </select>

                                <!-- Blog Title -->
                                <div class="col-md-12">
                                    <label class="form-label">Title</label>
                                    <input type="text" name="title" class="form-control" placeholder="Enter blog title"
                                        value="{{ old('title', $datas->title) }}">

                                    @error('title')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label">Sub Title</label>
                                    <input type="text" name="sub_title" class="form-control"
                                        placeholder="Enter blog sub title"
                                        value="{{ old('sub_title', $datas->sub_title) }}">

                                    @error('title')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Blog Content -->
                                <div class="col-md-12">
                                    <label class="form-label">Blog Content</label>




                                    <textarea id="editor" name="blog_content" class="form-control" style="color: black;min-height:300px;">{{ old('blog_content', $datas->blog_content) }}</textarea>


                                    @error('blog_content')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror

                                </div>

                                <div class="col-md-12">
                                    <label class="form-label">Short Content</label>
                                    <textarea name="short_content" rows="6" class="form-control" placeholder="Write blog short content here..."
                                        required style="color: black; min-height:300px;">{{ old('short_content', $datas->short_content) }}</textarea>
                                    @error('short_content')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror

                                </div>

                                <!-- Featured Image -->
                                <div class="col-md-12">
                                    <label class="form-label">Client Photo</label>
                                    <x-image />
                                    <span>current image</span>
                                    <img src="{{ asset('blogs/' . $datas->images) }}" alt=""
                                        style="height:200px;width:400px;">


                                    @error('logo')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror

                                </div>

                                <!-- Status -->
                                <div class="col-md-12">
                                    <label class="form-label">Status</label>
                                    <select name="status" class="form-select">
                                        <option value="1" {{ old('status', $datas->status) == 1 ? 'selected' : '' }}>
                                            Published
                                        </option>
                                        <option value="0" {{ old('status', $datas->status) == 0 ? 'selected' : '' }}>
                                            Pending
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
                            <button type="submit" class="btn btn-info">Update Blog</button>
                            <a href="{{ route('blog.create') }}" class="btn btn-secondary">Cancel</a>
                        </div>

                    </form>

                </div>

            </div>
        </div>
    </main>

@endsection
