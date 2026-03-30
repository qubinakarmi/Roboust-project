@extends('admin.layouts.app2')
@section('title', 'Author List')

@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}

            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="app-content mt-4">
        <div class="container-fluid">


                 <a href="{{ route('author.export') }}" class="btn btn-info">
                <i class="fa-solid fa-download fa-xl"></i> Download Author List
            </a>
            <!-- Search -->
            <div class="py-2">
                <form action="{{ route('author.index') }}" method="GET">
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
                    <h3 class="card-title mb-0">Author</h3>

                    <div class="d-flex flex-column flex-md-row justify-content-center align-items-center">
                        <a href="{{ route('author.create') }}" class="btn btn-success btn-sm">
                            <i class="fa-solid fa-plus"></i> Add Author
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
                                    <th>Email</th>
                                    <th>Bio</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($authors as $author)
                                    <tr>
                                        <td>{{ $author->name }}</td>
                                        <td>{{ $author->email }}</td>
                                        <td class="text-truncate" style="max-width: 200px;">
                                            {{ $author->bio }}
                                        </td>
                                        <td>
                                            <img src="{{ isset($author->image) ? asset('authors/' . $author->image) : '' }}"
                                                alt="{{ $author->name }}" class="img-fluid rounded"
                                                style="max-height: 80px;">
                                        </td>
                                        <td>
                                            <form action="{{ route('author.destroy', $author->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm my-1 w-100">
                                                    Delete
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
                <div class="card-footer clearfix">
                    <div class="d-flex justify-content-center">
                        {{ $authors->links('pagination::bootstrap-5') }}
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
