@extends('admin.layouts.app2')
@section('title', 'Category List ')

@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif












    <div class="app-content mt-4">
        <div class="container-fluid">




            <a href="{{ route('category.export') }}" class="btn btn-info"> <i class="fa-solid fa-download fa-xl"></i> Download
                Category</a>

            <div class="mb-3">
                <form action="{{ route('category.index') }}" method="GET">
                    <div class="d-flex justify-content-end align-items-center">


                        <!-- Search input -->
                        <input type="text" name="search" placeholder="Search" class="form-control me-2 w-25"
                            value="{{ request('search') }}">
                        <button type="submit" class="btn btn-success mx-2">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>

                    </div>
                </form>
            </div>

            <div class="card">

                <!-- Card Header -->
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="card-title mb-0">Author</h3>
                        <a href="{{ route('category.create') }}" class="btn btn-success btn-sm">
                            Add Category
                        </a>
                    </div>
                </div>

                <!-- Card Body -->
                <div class="card-body p-0">
                    <table class="table table-striped table-hover mb-0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Created_at</th>

                                <th>Action</th>


                            </tr>
                        </thead>
                        <tbody>


                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->name ?? 'N/A' }}</td>
                                    <td>{{ $category->created_at->format('m-d-Y') ?? 'N/A' }}</td>


                                    <td>

                                        <form action="{{ route('category.destroy', $category->id) }}" method="POST"
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
















                <!-- Card Footer -->
                <!-- Card Footer -->
                <div class="card-footer clearfix">
                    <span class="pagination px-2">{{ $categories->links('pagination::bootstrap-5') }}</span>

                </div>

            </div>

        </div>
    </div>

@endsection
