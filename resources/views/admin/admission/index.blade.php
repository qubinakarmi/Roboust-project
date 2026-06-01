@extends('admin.layouts.app2')
@section('title', 'Admission List')

@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}

            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="app-content mt-4">
        <div class="container-fluid">


            {{-- <a href="{{ route('author.export') }}" class="btn btn-info">
                <i class="fa-solid fa-download fa-xl"></i> Download Author List
            </a> --}}
            <!-- Search -->
            <div class="py-2">
                <form action="{{ route('enroll.index') }}" method="GET">
                    <div class="row g-2 ">
                        <div class="d-flex justify-content-center align-items-center me-2">
                            <input type="text" name="search" class="form-control w-25"
                                placeholder="Search Student name">
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
                    <h3 class="card-title mb-0">Admission List</h3>


                </div>

                <!-- Card Body -->
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Course</th>
                                    <th>Start_date</th>
                                    <th>Address</th>
                                    <th>Message</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($admissions as $admission)
                                    <tr>
                                        <td> {{ $admission->fullname ?? 'N/A' }}</td>
                                        <td> {{ $admission->email ?? 'N/A' }}</td>
                                        <td> {{ $admission->phone ?? 'N/A' }}</td>
                                        <td> {{ $admission->course->title ?? 'N/A' }}</td>
                                        <td> {{ $admission->start_date ?? 'N/A' }}</td>
                                        <td> {{ $admission->address ?? 'N/A' }}</td>
                                        <td> {{ $admission->message ?? 'N/A' }}</td>
                                        <td>
                                            <form action="{{ route('enroll.destroy', $admission->id) }}" method="POST"
                                                class="delete-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm my-2">
                                                    <i class="fa-solid fa-trash"></i>

                                                </button>
                                            </form>
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
                        {{ $authors->links('pagination::bootstrap-5') }}
                    </div>
                </div> --}}

            </div>

        </div>
    </div>
@endsection
