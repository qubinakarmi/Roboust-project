@extends('admin.layouts.app2')
@section('title', 'Add Testimonial')
@section('content')

    {{-- {{ dd($testimonials->company_name) }} --}}
    <main class="app-main">
        <div class="app-content">
            <div class="container-fluid">

                <div class="card card-info card-outline">

                    <!-- Header -->
                    <div class="card-header">
                        <h3 class="card-title">Edit Testimonial</h3>
                    </div>

                    <!-- Form -->
                    <form action="{{ route('testimonial.update', $datas->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <label class="form-label">Company Name</label>
                                    <input type="text" name="company_name" class="form-control"
                                        placeholder="Company or designation" value="{{ $datas->company_name }}">
     @error('company_name')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror 

                                </div>

                                <!-- Client Position / Company -->
                                <div class="col-md-12">
                                    <label class="form-label">Designation</label>
                                    <input type="text" name="designation" class="form-control"
                                        placeholder="Company or designation" value="{{ $datas->designation }}">
                                
                                     @error('designation')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror 
                                    </div>

                                <!-- Client Name -->
                                <div class="col-md-6">
                                    <label class="form-label">Client Name</label>
                                    <input type="text" name="client_name" class="form-control"
                                        placeholder="Enter client name" value="{{ $datas->client_name }}"required>
                               
                                    @error('client_name')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror 
                                    </div>
                                <!-- Testimonial Message -->
                                <div class="col-md-12">
                                    <label class="form-label">Message</label>
                                    <textarea id="editor" name="message" rows="5" class="form-control" placeholder="Write client feedback...">{{ $datas->message }}</textarea>
                                
                                     @error('message')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror 
                                </div>
                                <!-- Client Photo -->
                                {{-- {{-- <div class="col-md-12"> --}}
                                <div class="col-md-12">
                                    <label class="form-label">Client Photo</label>
                                    {{-- <input type="file" name="image" class="form-control"> --}}
                                    <x-image />
                                    <span>current image</span>
                                    <img src="{{ asset('testimonials/' . $datas->image) }}" alt=""
                                        style="height:100px;width:100px;">
                                
                                     @error('logo')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror 
                                    </div>
                                <!-- Status -->
                                <div class="col-md-6">
                                    <label class="form-label">Status</label>
                                    <select name="status" class="form-select">
                                        <option value="1" {{ $datas->status == 1 ? 'selected' : '' }}>Published
                                        </option>
                                        <option value="0" {{ $datas->status == 0 ? 'selected' : '' }}>Hidden
                                        </option>
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
