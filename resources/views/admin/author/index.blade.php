@extends('admin.layouts.app2')
@section('title', 'Author List')

@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="app-content mt-4">
        <div class="container-fluid">

            <div class="card">

                <!-- Card Header -->
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="card-title mb-0">Author</h3>
                        <a href="{{ route('author.create') }}" class="btn btn-success btn-sm">
                            Add Author
                        </a>
                    </div>
                </div>

                <!-- Card Body -->
                <div class="card-body p-0">
                    <table class="table table-striped table-hover mb-0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Bio</th>
                                <th>Image</th>
                                <th>Action</th>


                            </tr>
                        </thead>
                        <tbody>


                            @foreach ($authors as $author)
                                <tr>
                                    <td>{{ $author->name }}</td>
                                    <td>{{ $author->emali }}</td>
                                    <td>{{ $author->address }}</td>
                                    <td>{{ $author->bio }}</td>
                                    <td><img src="{{ isset($author->image) ? asset('authors/'.$author->image): 'null'}}" alt="{{ $author->name }}" style="height: 100px;widhth:100px;"></td>
                                    <td>

                                        <form action="{{ route('author.destroy',$author->id) }}" method="POST" class="delete-form">
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
                {{-- <div class="card-footer clearfix">
                    <span class="pagination px-2">{{ $contacts->links('pagination::bootstrap-5') }}</span>

                </div> --}}

            </div>

        </div>
    </div>

@endsection
