@extends('admin.layouts.app2')
@section('title', 'Add Settting ')
@section('content')

    <main class="app-main">
        <div class="app-content">
            <div class="container-fluid">





                <!-- Form -->
                <div class="card card-warning card-outline mb-4">
                    <div class="card-header">
                        <div class="card-title">Add Setting</div>
                    </div>

                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">

                            <!-- Title -->
                            <div class="row mb-3">
                                <label for="title" class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <input type="text" name="title" class="form-control" id="title"
                                        placeholder="Enter business title" required />
                                </div>
                            </div>

                            <!-- Logo/Image -->
                            <div class="row mb-3">
                                <label for="logo" class="col-sm-2 col-form-label">Logo Image</label>
                                <div class="col-sm-10">
                                    <x-image action="" />

                                    {{-- <input type="file" name="logo" class="form-control" id="logo" required /> --}}
                                </div>
                            </div>

                            <!-- Location -->
                            <div class="row mb-3">
                                <label for="location" class="col-sm-2 col-form-label">Location</label>
                                <div class="col-sm-10">
                                    <input type="text" name="location" class="form-control" id="location"
                                        placeholder="Enter business location" required />
                                </div>
                            </div>

                            <!-- Contact Information -->
                            <div class="row mb-3">
                                <label for="contact" class="col-sm-2 col-form-label">Contact Information</label>
                                <div class="col-sm-10">
                                    <input type="text" name="contact" class="form-control" id="contact"
                                        placeholder="Phone, Email, etc." required />
                                </div>
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
