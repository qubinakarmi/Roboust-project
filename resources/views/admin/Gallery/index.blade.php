@extends('admin.layouts.app2')
@section('title', 'Gallery')

@section('content')
    <div class="container mt-5">
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

        <h2 class="mb-4">Gallery</h2>
        <a class="btn btn-outline-primary mb-3" href="{{ route('gall.create') }}"><i class="fa-solid fa-plus"></i>Add</a>

        <div class="row g-3">
            @foreach ($galleries as $gallery)
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card shadow-sm position-relative">
                        <!-- Delete button on top right -->
                        <form action="{{ route('gall.destroy', $gallery->id) }}" method="POST"
                            class="position-absolute top-0 end-0 m-2 delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>

                        <img src="{{ isset($gallery->image) ? asset('gallery/' . $gallery->image): 'null' }}" class="card-img-top img-fluid"
                            alt="{{ $gallery->title }}">
                    </div>
                </div>
            @endforeach



                <!-- Card Footer -->
                <div class="card-footer clearfix">
                    <span class="pagination px-2">{{ $galleries->links('pagination::bootstrap-5') }}</span>

                </div>
        </div>
    </div>
@endsection
