@extends('admin.layouts.app2')
@section('title','Add Services')

@section('content')

<main class="app-main">
<div class="app-content">
<div class="container-fluid">

<div class="card card-info card-outline">

    <!-- Header -->
    <div class="card-header">
        <h3 class="card-title">Add New Service</h3>
    </div>

    <!-- Form -->
    <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="card-body">
            <div class="row g-3">

                <!-- Service Name -->
                <div class="col-md-12">
                    <label class="form-label">Service Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter service name" required>
                </div>

                <!-- Service Category -->
                <div class="col-md-6">
                    <label class="form-label">Category</label>
                    <input type="text" name="category" class="form-control" placeholder="Enter service category">
                </div>

                <!-- Status -->
                <div class="col-md-6">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>

                <!-- Service Description -->
                <div class="col-md-12">
                    <label class="form-label">Description</label>
                    <textarea name="description" rows="6" class="form-control" placeholder="Write service description..." required></textarea>
                </div>

                <!-- Service Image -->
                <div class="col-md-12">
                    <label class="form-label">Image</label>
                    <input type="file" name="image" class="form-control">
                </div>

            </div>
        </div>

        <!-- Footer -->
        <div class="card-footer">
            <button type="submit" class="btn btn-info">Add Service</button>
            <a href="{{ route('services.index') }}" class="btn btn-secondary">Cancel</a>
        </div>

    </form>

</div>

</div>
</div>
</main>

@endsection