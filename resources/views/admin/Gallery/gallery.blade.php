@extends('admin.layouts.app2')
@section('title', 'Add gallery')

@section('content')
     @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
    <div class="container">
        <h2>Upload Multiple Images</h2>

        <form action="{{ route('gall.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="col-md-12">
                <label for="">Image Title</label>
                <input type="text" name="title" id="" class="form-control mb-2" placeholder="Enter a Image Title">
            </div>

            <!-- Drag & Drop Area -->
            <div id="drop-area" class="border border-2 border-primary rounded p-5 text-center mb-3"
                style="cursor:pointer; background:#f8f9fa;">
                <p class="mb-2">Drag & Drop Images Here</p>
                <p class="text-muted">or Click to Select</p>
                <input type="file" name="images[]" id="images" multiple accept="image/*" hidden>
            </div>



            <!-- Preview Section -->
            <div class="row" id="preview"></div>

            <div class="col-md-6">
                <label class="form-label">Status</label>
                <select name="status" class="form-select">
                    <option value="1">Published</option>
                    <option value="0">pending</option>
                </select>
            </div>

            <button class="btn btn-success mt-3">Upload</button>
        </form>






        <div class="container mt-5">
        

            <h2 class="mb-4">Gallery</h2>
            <a class="btn btn-outline-primary mb-3" href="{{ route('gall.create') }}"><i
                    class="fa-solid fa-plus"></i>Add</a>

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

                            <img src="{{ asset('gallery/' . $gallery->image) }}" class="card-img-top img-fluid"
                                alt="{{ $gallery->title }}">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>






@endsection
