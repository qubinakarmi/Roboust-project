@extends('admin.layouts.app2')
@section('title', 'Blog List')

@section('content')
    <div class="app-content mt-4">
        <div class="container-fluid">



            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card">

                <!-- Card Header -->
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="card-title mb-0">Blog Posts</h3>
                        <a href="{{ route('blog.create') }}" class="btn btn-success btn-sm" id="btn">
                            Add New Blog
                        </a>
                    </div>
                </div>

                <!-- Card Body -->
                <div class="card-body p-0">
                    <table class="table table-striped table-hover mb-0">
                        <thead>
                            <tr>
                                <th>Author</th>
                                <th>Title</th>
                                <th>slug</th>
                                <th>Sub Title</th>
                                <th>Blog Content</th>
                                <th>Short Content</th>
                                <th>image</th>
                                <th>Status</th>
                                <th style="width: 180px">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($blogs as $blog)
                                <tr>
                                    <td>{{ $blog->author->name ?? 'N/A' }}</td>
                                    <td>{{ $blog->title ?? 'N/A' }}</td>
                                    <td>{{ $blog->slug ?? 'N/A' }}</td>
                                    <td>{{ $blog->sub_title ?? 'N/A' }}</td>
                                    <td>{!! $blog->blog_content ?? 'N/A' !!}</td>
                                    <td>{{ $blog->short_content ?? 'N/A' }}</td>

                                    <td><img src="{{ asset('blogs/' .$blog->images) }}" alt=""
                                            style="height: 100px;width:100px;"></td>
                                    <td>
                                        @if ($blog->status === 0)
                                            <span class="alert alert-warning p-1" role="alert">hidden</span>
                                        @else
                                            <span class="alert alert-success p-1 text-black" role="alert">visible</span>
                                        @endif
                                    </td>
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

                <!-- Card Footer (Pagination) -->
                {{-- <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-end">
                        <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                    </ul>
                </div> --}}


                     <!-- Card Footer -->
                <div class="card-footer clearfix">
                    <span class="pagination px-2">{{ $blogs->links('pagination::bootstrap-5') }}</span>

                </div>

            </div>

        </div>
    </div>







    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>



@endsection
