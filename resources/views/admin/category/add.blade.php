@extends('admin.layouts.app2')
@section('title', 'Add Settting ')
@section('content')

    <main class="app-main">
        <div class="app-content">
            <div class="container-fluid">



                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <span>{{ session('success') }}</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <!-- Form -->
                <div class="card card-warning card-outline mb-4">
                    <div class="card-header">
                        <div class="card-title">Add Category</div>
                    </div>

                    <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data"   data-parsley-validate novalidate>
                        @csrf
                        <div class="card-body">

                            <!-- Title -->
                            <div class="row mb-3">
                                <label for="title" class="col-sm-2 col-form-label">Category</label>
                                <div class="col-sm-10">
                                    <input type="text" name="category" class="form-control" id="title"
                                        placeholder="Enter Category for services" value="{{ old('category') }}" required/>
                                </div>
                                <span>@error('category') <p style="color:red;">{{ $message }}</p> @enderror</span>
                            </div>


                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-warning">Save</button>
                            <a href="" class="btn btn-secondary float-end">Cancel</a>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </main>

@endsection
