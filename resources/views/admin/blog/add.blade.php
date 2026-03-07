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
                    <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="card-body">
                            <div class="row g-3">

                                <!-- Blog Title -->
                                <div class="col-md-12">
                                    <label class="form-label">Title</label>
                                    <input type="text" name="title" class="form-control" placeholder="Enter blog title"
                                        required>
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label">Sub Title</label>
                                    <input type="text" name="title" class="form-control"
                                        placeholder="Enter blog sub title" required>
                                </div>

                                <!-- Author -->
                                <div class="col-md-6">
                                    <label class="form-label">Author Name</label>
                                    <input type="text" name="author" class="form-control"
                                        placeholder="Enter author name">
                                </div>

                                <!-- Status -->
                                <div class="col-md-6">
                                    <label class="form-label">Status</label>
                                    <select name="status" class="form-select">
                                        <option value="published">Published</option>
                                        <option value="draft">Draft</option>
                                    </select>
                                </div>

                                <!-- Blog Content -->
                                <div class="col-md-12">
                                    <label class="form-label">Blog Content</label>
                                    <textarea id="editor" name="content" rows="6" class="form-control" placeholder="Write blog content here..."
                                        required style="color: black,min-height:300px;"></textarea>
                                </div>

                                <!-- Featured Image -->
                                <div class="col-md-12">
                                    <label class="form-label">Featured Image</label>
                                    {{-- <input type="file" name="image" class="form-control"> --}}
                                    <x-image action="" />

                                </div>

                            </div>
                        </div>

                        <!-- Footer -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-info">Publish Blog</button>
                            <a href="{{ route('blogs.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>

                    </form>

                </div>

            </div>
        </div>
    </main>

@endsection
