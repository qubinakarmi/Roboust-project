@extends('admin.layouts.app2')
@section('title', 'Add Blog')

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
                    <form action="  {{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="card-body">
                            <div class="row g-3">


                                <!-- Category -->
                                <select name="author_id" class="form-control mb-2">
                                    <option value="">Select Author</option>
                                    @foreach ($authors as $author)
                                        <option value=" {{ $author->id }}">{{ $author->name }} </option>
                                    @endforeach
                                </select>

                                <!-- Blog Title -->
                                <div class="col-md-12">
                                    <label class="form-label">Title</label>
                                    <input type="text" name="title" class="form-control"
                                        placeholder="Enter blog title" value="{{ old('title') }}">
                                    @error('title')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="col-md-12">
                                    <label class="form-label">Sub Title</label>
                                    <input type="text" name="sub_title" class="form-control"
                                        placeholder="Enter blog sub title"  value="{{ old('sub_title') }}">
                                    @error('sub_title')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror

                                </div>

                                <!-- Blog Content -->
                                <div class="col-md-12">
                                    <label class="form-label">Blog Content</label>
                                    <textarea name="blog_content" class="form-control" id="editor">{{ old('blog_content') }}</textarea>
                                    @error('blog_content')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror

                                </div>

                                <div class="col-md-12">
                                    <label class="form-label">Short Content</label>
                                    <textarea name="short_content" rows="6" class="form-control" placeholder="Write blog short content here..."
                                        style="color: black; min-height:300px;">{{ old('short_content') }}</textarea>
                                    @error('short_content')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror

                                </div>

                                <!-- Featured Image -->
                                <div class="col-md-12">
                                    <label class="form-label">Featured Image</label>
                                    {{-- <input type="file" name="image" class="form-control"> --}}
                                    <x-image action="" />

                                    @error('logo')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror


                                </div>

                                <!-- Status -->
                                <div class="col-md-12">
                                    <label class="form-label">Status</label>
                                    <select name="status" class="form-select">
                                        <option value="1">Published</option>
                                        <option value="0">Pending</option>
                                    </select>
                                </div>

                            </div>
                        </div>

                        <!-- Footer -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-info">Publish Blog</button>
                            <a href="{{ route('blog.create') }}" class="btn btn-secondary">Cancel</a>
                        </div>

                    </form>

                </div>

            </div>
        </div>
    </main>

    <details>
        <summary>
            hello
        </summary>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum necessitatibus commodi illo, atque numquam
            dolores nostrum? Autem, nemo dolor natus animi vitae quas dignissimos illo, facilis, qui mollitia ipsam
            ex?Minima, sit tenetur necessitatibus voluptates libero enim ratione amet in corrupti consequuntur voluptatibus
            illo! Distinctio quos voluptate, consequatur, officia eum voluptatibus modi voluptatum fugit repellendus
            similique quam dolores, porro error?</p>
    </details>

@endsection
