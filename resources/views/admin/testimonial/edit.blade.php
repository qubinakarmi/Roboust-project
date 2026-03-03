@extends('admin.layouts.app2')
@section('title','Edit Testimonial ')
@section('content')
<main class="app-main">
<div class="app-content">
<div class="container-fluid">

<div class="card card-info card-outline">

    <!-- Header -->
    <div class="card-header">
        <h3 class="card-title">Add New Testimonial</h3>
    </div>

    <!-- Form -->
    <form action="{{ route('testimonial.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="card-body">
            <div class="row g-3">

                <!-- Client Name -->
                <div class="col-md-6">
                    <label class="form-label">Client Name</label>
                    <input type="text" name="client_name" class="form-control" placeholder="Enter client name" required>
                </div>

                <!-- Client Position / Company -->
                <div class="col-md-6">
                    <label class="form-label">Company / Position</label>
                    <input type="text" name="company" class="form-control" placeholder="Company or designation">
                </div>

                <!-- Rating -->
                <div class="col-md-6">
                    <label class="form-label">Rating</label>
                    <select name="rating" class="form-select">
                        <option value="5">⭐⭐⭐⭐⭐ (5)</option>
                        <option value="4">⭐⭐⭐⭐ (4)</option>
                        <option value="3">⭐⭐⭐ (3)</option>
                        <option value="2">⭐⭐ (2)</option>
                        <option value="1">⭐ (1)</option>
                    </select>
                </div>

                <!-- Status -->
                <div class="col-md-6">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="published">Published</option>
                        <option value="hidden">Hidden</option>
                    </select>
                </div>

                <!-- Testimonial Message -->
                <div class="col-md-12">
                    <label class="form-label">Testimonial Message</label>
                    <textarea name="message" rows="5" class="form-control" placeholder="Write client feedback..." required></textarea>
                </div>

                <!-- Client Photo -->
                <div class="col-md-12">
                    <label class="form-label">Client Photo</label>
                    <input type="file" name="image" class="form-control">
                </div>

            </div>
        </div>

        <!-- Footer -->
        <div class="card-footer">
            <button type="submit" class="btn btn-info">Save Testimonial</button>
            <a href="{{ route('testimonial.index') }}" class="btn btn-secondary">Cancel</a>
        </div>

    </form>

</div>

</div>
</div>
</main>

@endsection