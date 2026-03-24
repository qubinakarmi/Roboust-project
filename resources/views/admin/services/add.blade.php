@extends('admin.layouts.app2')
@section('title', 'Add Services')

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
                    <form action="{{ route('service.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="card-body">
                            <div class="row g-3">

                                <!-- Service Name -->
                                <div class="col-md-12">
                                    <label class="form-label">Service Name</label>
                                    <input type="text" name="name" class="form-control"
                                        placeholder="Enter service name">


                                    @error('name')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>

                                

                                <div class="col-md-12">
                                    <label class="form-label">Sub Title</label>
                                    <input type="text" name="sub_title" class="form-control"
                                        placeholder="Enter Sub title">

                                    @error('sub_title')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>





                                <!-- short Description -->
                                <div class="col-md-12">
                                    <label class="form-label">Short Description</label>
                                    <textarea name="short_desc" rows="6" class="form-control" placeholder="Write service description..."></textarea>

                                    @error('shprt_desc')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Service Description -->
                                <div class="col-md-12">
                                    <label class="form-label">Description</label>
                                    <textarea id="editor" name="description" class="form-control" placeholder="Write service description..."></textarea>

                                    @error('description')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror

                                </div>

                                <!-- Service Category -->
                                <div class="col-md-6">
                                    <label class="form-label">Category</label>
                                    <select name="category_id" id="" class="form-control">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach

                                    </select>

                                    @error('category_id')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror

                                </div>



                                <!-- Service Image -->
                                <div class="col-md-12">
                                    <label class="form-label">Image</label>
                                    <x-image action="" />

                                    @error('logo')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Status -->
                                <div class="col-md-6">
                                    <label class="form-label">Status</label>
                                    <select name="status" class="form-select">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>


                                    @error('status')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>
                        </div>

                        <!-- Footer -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-info">Add Service</button>
                            <a href="{{ route('service.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>

                    </form>

                </div>

            </div>
        </div>
    </main>

@endsection
