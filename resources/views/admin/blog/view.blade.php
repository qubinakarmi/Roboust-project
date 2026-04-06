@extends('admin.layouts.app2')
@section('title', 'View Blog List')

@section('content')
    <div class="app-content mt-4">
        <div class="container-fluid">



            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <a href="{{ route('blog.export') }}" class="btn btn-info">
                <i class="fa-solid fa-download fa-xl"></i> Download All Blogs
            </a>



            <div class="mb-3">
                <form action="{{ route('blog.index') }}" method="GET">
                    <div class="d-flex justify-content-center align-items-centeralign-items-center">


                        <!-- Search input -->
                        <input type="text" name="search" placeholder="Search" class="form-control me-2 w-25"
                            value="{{ request('search') }}">

                        <!-- Author dropdown -->
                        <select id="authorFilter" name="author_id" class="form-control  me-2 w-25">
                            <option value="">Select Author</option>
                            @foreach ($authors as $author)
                                <option value="{{ $author->id }}" {{ 'author_id' == $author->id ? 'selected' : '' }}>
                                    {{ $author->name }}
                                </option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-success mx-2">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>

                    </div>
                </form>
            </div>








            <div class="card">

                <!-- Card Header -->
                <div class="card-header">
                    <h3 class="card-title mb-0">Blog Posts</h3>

                    <div class="d-flex justify-content-center align-items-center">
                        <a href="{{ route('blog.create') }}" class="btn btn-success btn-sm p-2" id="btn">
                            <i class="fa-solid fa-plus"></i>Add Blog
                        </a>
                    </div>


                </div>

                <!-- Card Body -->
                <div class="card-body p-0">
                    <div class="table-responsive">

                        <table class="table table-striped table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>Author</th>
                                    <th>Title</th>
                                    <th>Sub Title</th>
                                    <th>Short Content</th>
                                    <th>Meta Title</th>
                                    <th>Meta Keyword</th>
                                    <th>Meta Description</th>
                                    <th>image</th>
                                    <th>Status</th>
                                    <th>Created_at</th>

                                    <th style="width: 180px">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($blogs as $blog)
                                    <tr>
                                        <td>{{ $blog->author->name ?? 'N/A' }}</td>
                                        <td>{{ $blog->title ?? 'N/A' }}</td>
                                        <td>{{ $blog->sub_title ?? 'N/A' }}</td>
                                        <td>{{ $blog->short_content ?? 'N/A' }}</td>
                                        <td>{{ $blog->meta_title }}</td>
                                        <td>{{ $blog->meta_keywords }}</td>
                                        <td>{{ $blog->meta_description }}</td>




                                        <td><img src="{{ asset('blogs/' . $blog->images) }}" alt=""
                                                style="height: 100px;width:100px;"></td>


                                        <td>


                                            @if ($blog->status === 0)
                                                <span class="alert alert-warning p-1" role="alert">hidden</span>
                                            @else
                                                <span class="alert alert-success p-1 text-black"
                                                    role="alert">visible</span>
                                            @endif
                                        </td>


                                        <td>{{ $blog->created_at->format('m-d-Y') }}</td>

                                        <td>
                                            <a href="{{ route('blog.edit', $blog->id) }}"
                                                class="btn btn-primary btn-sm">Edit</a>




                                            <form action="{{ route('blog.destroy', $blog->id) }}" method="POST"
                                                class="delete-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm my-2">Delete</button>
                                            </form>


                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>




                <!-- Card Footer -->
                <div class="card-footer clearfix">
                    <div class="d-flex justify-content-center">
                        <span class="pagination px-2">{{ $blogs->links('pagination::bootstrap-5') }}</span>
                    </div>
                </div>

            </div>

        </div>
    </div>










@endsection
