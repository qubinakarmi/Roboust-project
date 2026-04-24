@extends('admin.layouts.app2')
@section('title', 'Edit Team')

@section('content')

    <main class="app-main">
        <div class="app-content">
            <div class="container-fluid">

                <div class="card card-info card-outline">

                    <!-- Header -->
                    <div class="card-header">
                        <h3 class="card-title">Add Team Member</h3>
                    </div>

                    <!-- Form -->
                    <form action="{{ route('team.update',$team->id) }}" method="POST" enctype="multipart/form-data" data-parsley-validate novalidate>
                        @csrf
                        @method('PUT')

                        <div class="card-body">
                            <div class="row g-3">
                                <!-- Position -->
                                <div class="col-md-12">
                                    <label class="form-label">Designation</label>
                                    <input type="text" name="designation" class="form-control"
                                        placeholder="Example: Web Developer" required>


                                    @error('designation')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <!-- Full Name -->
                                <div class="col-md-12">
                                    <label class="form-label">Full Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter full name" required>

                                    @error('name')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>



                                <!-- Email -->
                                <div class="col-md-12">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Enter email" required data-parsley-type="email" data-parsley-maxlength="25">

                                    @error('email')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Phone -->
                                <div class="col-md-12">
                                    <label class="form-label">Phone</label>
                                    <input type="text" name="phone" class="form-control"
                                        placeholder="Enter phone number" required data-parsley-maxlength="15" data-parsley-type="number">

                                    @error('phone')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Address -->
                                <div class="col-md-12">
                                    <label class="form-label">Address</label>
                                    <input type="text" name="address" class="form-control" placeholder="Enter address" required>

                                    @error('address')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Bio / Description -->
                                <div class="col-md-12">
                                    <label class="form-label">Short Bio</label>
                                    <textarea id ="editor" name="bio" class="form-control" rows="3" placeholder="Write short introduction" ></textarea>

                                    @error('bio')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Profile Image -->
                                <div class="col-md-12">
                                    <label class="form-label">Profile Image</label>
                                    <x-image />

                                    @error('logo')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Social Links -->
                                <div class="col-md-12">
                                    <label class="form-label">LinkedIn</label>
                                    <input type="text" name="linkedin" class="form-control" placeholder="LinkedIn URL">

                                    @error('linkedin')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label">Twitter</label>
                                    <input type="text" name="twitter" class="form-control" placeholder="Twitter URL">


                                    @error('twitter')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label">Facebook</label>
                                    <input type="text" name="facebook" class="form-control" placeholder="Facebook URL">

                                    @error('facebook')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>



                                <div class="col-md-12">
                                    <label class="form-label">Ordering</label>
                                    <input type="text" name="ordering" class="form-control" placeholder="Ordering">

                                    @error('ordering')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror

                                </div>

                                <!-- Status -->
                                <div class="col-md-6">
                                    <label class="form-label">Status</label>
                                    <select name="status" class="form-control">
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
                            <button type="submit" class="btn btn-info">Save Team Member</button>
                        </div>

                    </form>

                </div>

            </div>
        </div>
    </main>

@endsection
