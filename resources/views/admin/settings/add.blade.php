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
                        <div class="card-title">Add Setting</div>
                    </div>

                    <form action="{{ route('sets.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">

                            <!-- Title -->
                            <div class="row mb-3">
                                <label for="title" class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <input type="text" name="title" class="form-control" id="title"
                                        placeholder="Enter business title" value="{{ $settings['title'] ?? '' }}" />
                                </div>
                            </div>

                            <!-- Logo/Image -->
                            <div class="row mb-3">
                                <label for="logo" class="col-sm-2 col-form-label">Logo Image</label>
                                <div class="col-sm-10">
                                    <x-image action="" />
                                    <p>
                                        <li>current image</li>
                                    </p>

                                    <img src="{{ isset($settings['logo']) ? asset('settings/' . $settings['logo']) : '' }}"
                                        width="100">


                                    {{-- <input type="file" name="logo" class="form-control" id="logo" required /> --}}
                                </div>
                            </div>

                            <!-- Location -->
                            <div class="row mb-3">
                                <label for="location" class="col-sm-2 col-form-label">Location</label>
                                <div class="col-sm-10">
                                    <input type="text" name="location" class="form-control" id="location"
                                        placeholder="Enter business location"
                                        value="{{ $settings['location'] ?? '' }}"required />
                                </div>
                            </div>

                            <!-- Contact Information -->
                            <div class="row mb-3">
                                <label for="contact" class="col-sm-2 col-form-label">Contact Information</label>
                                <div class="col-sm-10">
                                    <input type="text" name="contact" class="form-control"
                                        placeholder="Phone, Email, etc." value="{{ $settings['contact'] ?? '' }}"
                                        required />
                                </div>
                            </div>
                            <label class="col-sm-2 col-form-label">date</label>
                            <input type="date" name="date" id="" class="form-control">

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
