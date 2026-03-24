@extends('admin.layouts.app2')
@section('title', 'Add Testimonial')
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
                                <div class="col-md-12">
                                    <label class="form-label">Company Name</label>
                                    <input type="text" name="company_name" class="form-control"
                                        placeholder="Company or designation">

                                             @error('company_name')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror 
                                </div>

                                <!-- Client Position / Company -->
                                <div class="col-md-12">
                                    <label class="form-label">Designation</label>
                                    <input type="text" name="designation" class="form-control"
                                        placeholder="Company or designation">

                                             @error('designation')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror 
                                </div>

                                <!-- Client Name -->
                                <div class="col-md-6">
                                    <label class="form-label">Client Name</label>
                                    <input type="text" name="client_name" class="form-control"
                                        placeholder="Enter client name" required>

                                             @error('client_name')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror 
                                </div>
                                <!-- Testimonial Message -->
                                <div class="col-md-12">
                                    <label class="form-label">Message</label>
                                    <textarea id="editor" name="message"></textarea>
                                     @error('message')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror 
                                
                                </div>
                                <!-- Client Photo -->

                                <label class="form-label">Client Photo</label>

                                <x-image />

                                     @error('logo')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror 
                                <!-- Status -->
                                <div class="col-md-6">
                                    <label class="form-label">Status</label>
                                    <select name="status" class="form-select">
                                        <option value="1">Published</option>
                                        <option value="0">Hidden</option>
                                    </select>

                                         @error('status')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror 
                                </div>






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
