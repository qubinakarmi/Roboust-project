@extends('admin.layouts.app2')
@section('title', 'Add Alumini')

@section('content')

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="container">

        <h2>Upload Multiple Images</h2>

        <form action="{{ route('alum.store') }}" method="POST" enctype="multipart/form-data">

            @csrf

            <!-- Title -->
            <div class="mb-3">
                <label class="form-label">Image Title</label>

                <input type="text" name="title" class="form-control" placeholder="Enter Image Title"
                    value="{{ old('title') }}">

                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Drag Drop Area -->
            <div class="drop-area border border-2 border-primary rounded p-5 text-center mb-3"
                style="cursor:pointer; background:#f8f9fa;">

                <p class="mb-2">Drag & Drop Images Here</p>
                <p class="text-muted">or Click to Select</p>

                <input type="file" name="images[]" class="file-input" multiple accept="image/*" hidden>
            </div>

            <!-- Preview -->
            <div class="row" id="preview"></div>

            @error('images')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            @error('images.*')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            <!-- Status -->
            <div class="mb-3">
                <label class="form-label">Status</label>

                <select name="status" class="form-select">
                    <option value="1">Published</option>
                    <option value="0">Pending</option>
                </select>

                @error('status')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Submit -->
            <button type="submit" class="btn btn-success">
                Upload Images
            </button>

        </form>

        <!-- Gallery -->
        <div class="container mt-5">

            <h2 class="mb-4">Alumini</h2>

            <div class="row g-3">

                @foreach ($aluminies as $alumini)
                    <div class="col-sm-6 col-md-4 col-lg-3">

                        <div class="card shadow-sm position-relative">

                            <!-- Delete -->
                            <form action="{{ route('alum.destroy', $alumini->id) }}" method="POST"
                                class="position-absolute top-0 end-0 m-2">

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-outline-danger btn-sm">

                                    <i class="fa-solid fa-trash"></i>

                                </button>

                            </form>

                            <!-- Image -->
                            <img src="{{ asset('alumini/' . $alumini->image) }}" class="card-img-top img-fluid"
                                style="height:200px; object-fit:cover;" alt="{{ $alumini->title }}">

                        </div>

                    </div>
                @endforeach
                {{-- <div class="card-footer clearfix">
                    <div class="d-flex justify-content-center">
                        <span class="pagination px-2">{{ $aluminies->links('pagination::bootstrap-5') }}</span>
                    </div>
                </div> --}}
            </div>

        </div>

    </div>

@endsection
