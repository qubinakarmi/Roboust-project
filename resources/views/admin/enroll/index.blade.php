@extends('admin.layouts.app2')
@section('title', 'Enroll List')

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
                <form action="{{ route('enrollment.index') }}" method="GET">
                    <div class="row g-2 ">
                        <div class="d-flex justify-content-center align-items-center me-2">
                            <input type="text" name="search" class="form-control w-25" placeholder="Search ">
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
                    <h3 class="card-title mb-0">Enroll</h3>


                </div>

                <!-- Card Body -->
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Image</th>
                                    <th>Created_at</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($enrolls as $enroll)
                                    <tr>
                                        <td>{{ $enroll->name ?? 'N/A' }}</td>
                                        <td>{{ $enroll->email ?? 'N/A' }}</td>
                                        <td>{{ $enroll->contact  ?? 'N/A' }}</td>


                                        <td>
                                            <img src="{{ isset($enroll->image) ? asset('enrolls/' . $enroll->image) : '' }}"
                                                alt="{{ $enroll->name }}" class="img-fluid rounded"
                                                style="max-height: 80px;">
                                        </td>
                                        <td>{{ $enroll->created_at->format('m-d-Y')  ?? 'N/A' }}</td>


                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Card Footer -->
                <div class="card-footer clearfix">
                    <div class="d-flex justify-content-center">
                        {{ $enrolls->links('pagination::bootstrap-5') }}
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
