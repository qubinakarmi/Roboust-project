@extends('admin.layouts.app2')
@section('title', 'Requirement List')

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
                <form action="{{ route('requirement.index') }}" method="GET">
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

                <div class="card-header">
                    <h3 class="card-title mb-0">Requirement</h3>

                    <div class="d-flex flex-column flex-md-row justify-content-center align-items-center">
                        <a href="{{ route('requirement.create') }}" class="btn btn-success btn-sm">
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
                                    <th>Name</th>
                                    <th>Created_at</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($collects as $collect)
                                    <tr>
                                        <td>{{ $collect->details }}</td>
                                        <td>{{ $collect->created_at }}</td>
                                        <td>
                                            <form action="{{ route('requirement.destroy', $collect->id) }}" method="POST"
                                                enctype="multipart/form-data" class="delete-form">
                                                @csrf
                                                @method('DELETE')

                                                <button class="btn btn-danger btn-sm mx-2"><i
                                                        class="fa-solid fa-trash-can"></i></button>

                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card-footer clearfix">
                    <div class="d-flex justify-content-center">
                        {{ $collects->links('pagination::bootstrap-5') }}
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
