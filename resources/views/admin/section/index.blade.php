@extends('admin.layouts.app2')
@section('title', 'Section List')

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
                <form action="{{ route('section.index') }}" method="GET">
                    <div class="row g-2 ">
                        <div class="d-flex justify-content-center align-items-center me-2">
                            <input type="text" name="search" class="form-control w-25" placeholder="Search title">
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
                    <h3 class="card-title mb-0">Section List</h3>

                    <div class="d-flex flex-column flex-md-row justify-content-center align-items-center">
                        <a href="{{ route('section.create') }}" class="btn btn-success btn-sm">
                            <i class="fa-solid fa-plus"></i>
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
                                    <td>Description</td>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Created_at</th>

                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sections as $section)
                                    <tr>
                                        <td>
                                            {{ $section->title }}

                                        </td>
                                        <td>
                                            {{ $section->description }}
                                        </td>

                                        <td><img src="{{ asset('sections/' . $section->image) }}" alt=""
                                                style="height: 200px;width:300px;">
                                        </td>
                                        <td>{{ $section->status }}</td>

                                        <td>{{ $section->created_at }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ route('section.edit', $section->id) }}"
                                                    class="btn btn-warning btn-sm"><i
                                                        class="fa-regular fa-pen-to-square"></i></a>
                                                <form action="{{ route('section.destroy', $section->id) }}" method="POST"
                                                    enctype="multipart/form-data" class="delete-form">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button class="btn btn-danger btn-sm mx-2"><i
                                                            class="fa-solid fa-trash-can"></i></button>

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
                {{-- <div class="card-footer clearfix">
                    <div class="d-flex justify-content-center">
                        {{ $courses->links('pagination::bootstrap-5') }}
                    </div>
                </div> --}}

            </div>

        </div>
    </div>
@endsection
