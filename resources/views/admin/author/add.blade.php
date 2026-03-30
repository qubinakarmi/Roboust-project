@extends('admin.layouts.app2')
@section('title', 'Add Author')

@section('content')

    <main class="app-main">
        <div class="app-content">
            <div class="container-fluid">

                <div class="card card-info card-outline">

                    <!-- Header -->
                    <div class="card-header">
                        <h3 class="card-title">Add New Author</h3>
                    </div>

                    <!-- Form -->
                    <form action="{{ route('author.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="card-body">
                            <div class="row g-3">

                                <!-- Service Name -->
                                <div class="col-md-12">
                                    <label class="form-label">Author Name</label>
                                    <input type="text" name="name" class="form-control"
                                        placeholder="Enter author name">

                                        @error('name')
                                        <span style="color: red;">{{ $message }}</span>

                                        @enderror

                                        
                                </div>

                                

                                <div class="col-md-12">
                                    <label class="form-label">Email</label>
                                    <input type="text" name="email" class="form-control" placeholder="Enter Email">
                                
                                            @error('email')
                                        <span style="color: red;">{{ $message }}</span>

                                        @enderror
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label">Address</label>
                                    <input type="text" name="address" class="form-control" placeholder="Enter Email">
                                
                                            @error('address')
                                        <span style="color: red;">{{ $message }}</span>

                                        @enderror
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">Bio</label>
                                    <textarea name="bio" placeholder="Enter your bio" class="form-control"></textarea>
                                
                                
                                            @error('bio')
                                        <span style="color: red;">{{ $message }}</span>

                                        @enderror
                                </div>













                                <!-- Author Image -->
                                <div class="col-md-12">
                                    <label class="form-label">Image</label>
                                    <x-image action="" />
                                
                                
                                            @error('logo')
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
