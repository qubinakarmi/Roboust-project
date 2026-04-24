@extends('admin.layouts.app2')
@section('title', 'Course List')

@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}

            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="app-content mt-4">
        <div class="container-fluid">


            {{-- <a href="{{ route('course.export') }}" class="btn btn-info">
                <i class="fa-solid fa-download fa-xl"></i> Download course List
            </a> --}}
            <!-- Search -->
            <div class="py-2">
                <form action="{{ route('course.index') }}" method="GET">
                    <div class="row g-2 ">
                        <div class="d-flex justify-content-center align-items-center me-2">
                            <input type="text" name="search" class="form-control w-25" placeholder="Search Author">
                            <button type="submit" class="btn btn-success mx-2">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>


                        </div>
                    </div>
                </form>
            </div>

            <div class="card">

                <!-- Card Header -->
                <div class="card-header">
                    <h3 class="card-title mb-0">Course</h3>

                    <div class="d-flex flex-column flex-md-row justify-content-center align-items-center">
                        <a href="{{ route('course.create') }}" class="btn btn-success btn-sm">
                            <i class="fa-solid fa-plus"></i> Add Course
                        </a>
                    </div>
                </div>

                <!-- Card Body -->
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Sub Title</th>
                                    <th>Short Description</th>
                                    <th>Price</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Created_at</th>

                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($courses as $course)
                                    <tr>
                                        <td>{{ $course->title }}</td>
                                        <td>{{ $course->sub_title }}</td>
                                        <td class="text-truncate" style="max-width: 200px;">
                                            {{ $course->short_desc }}
                                        </td>
                                        <td>{{ $course->price }}</td>
                                        <td>
                                            <img src="{{ isset($course->image) ? asset('courses/' . $course->image) : '' }}"
                                                alt="{{ $course->name }}" class="img-fluid rounded"
                                                style="max-height: 80px;">
                                        </td>
                                        <td>

                                            @if ($course->status === 0)
                                                <span class="alert alert-warning p-1" role="alert">Pending</span>
                                            @else
                                                <span class="alert alert-success p-1 text-black"
                                                    role="alert">Published</span>
                                            @endif
                                        </td>
                                        <td>{{ $course->created_at->format('m-d-Y') }}</td>

                                        <td>
                                            <form action="{{ route('course.destroy', $course->id) }}" method="POST"
                                                class="delete-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm my-2">Delete</button>
                                            </form>
                                            <a href="{{ route('course.edit', $course->id) }}"
                                                class="btn btn-warning">Edit</a>
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
                        {{ $courses->links('pagination::bootstrap-5') }}
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
