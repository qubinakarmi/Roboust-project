@extends('admin.layouts.app2')
@section('title', 'Teacher List')

@section('content')


    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}

            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif
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
                <form action="{{ route('teacher.index') }}" method="GET">
                    <div class="row g-2 ">
                        <div class="d-flex justify-content-center align-items-center me-2">
                            <input type="text" name="search" class="form-control w-25" placeholder="Search Teacher">
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
                    <h3 class="card-title mb-0">Teachers</h3>

                    <div class="d-flex flex-column flex-md-row justify-content-center align-items-center">
                        <a href="{{ route('teacher.create') }}" class="btn btn-success btn-sm">
                            <i class="fa-solid fa-plus"></i> Add Techer
                        </a>
                    </div>
                </div>

                <!-- Card Body -->
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Subject</th>
                                    <th>Short Description</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Created_at</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($teachers as $teacher)
                                    <tr>
                                        <td>{{ $teacher->name ?? 'N/A' }}</td>
                                        <td>{{ $teacher->subject ?? 'N/A' }}</td>
                                        <td class="text-truncate" style="max-width: 200px;">
                                            {{ $teacher->short_desc ?? 'N/A' }}
                                        </td>
                                        <td>
                                            <img src="{{ isset($teacher->image) ? asset('teachers/' . $teacher->image) : '' }}"
                                                alt="{{ $teacher->name }}" class="img-fluid rounded"
                                                style="max-height: 80px;">
                                        </td>
                                        <td>

                                            @if ($teacher->status === 0)
                                                <span class="alert alert-warning p-1" role="alert">Pending</span>
                                            @else
                                                <span class="alert alert-success p-1 text-black"
                                                    role="alert">Published</span>
                                            @endif
                                        </td>
                                        <td>{{ $teacher->created_at->format('m-d-Y') ?? 'N/A' }}</td>

                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ route('teacher.edit', $teacher->id) }}"
                                                    class="btn btn-warning btn-sm"> <i
                                                        class="fa-regular fa-pen-to-square"></i>
                                                </a>
                                                <form action="{{ route('teacher.destroy', $teacher->id) }}" method="POST"
                                                    class="delete-form">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm mx-2"> <i
                                                            class="fa-solid fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
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
                        {{ $teachers->links('pagination::bootstrap-5') }}
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
