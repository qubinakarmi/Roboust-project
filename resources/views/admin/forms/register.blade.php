    
@extends('admin.layouts.app2')
@section('title','Add Services')

@section('content')

<main class="app-main">
<div class="app-content">
<div class="container-fluid">

<div class="card card-info card-outline">

    <!-- Header -->
    <div class="card-header">
        <h3 class="card-title">Register User </h3>
    </div>

    <!-- Form -->
    <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="card-body">
            <div class="row g-3">

                <!-- Service Name -->
                <div class="col-md-12">
                    <label class="form-label">Full Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter Your Name" required>
                </div>

                <!-- Service Category -->
                <div class="col-md-6">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter Your email">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Phone</label>
                    <input type="number" name="phone" class="form-control" placeholder="Enter Your Phone Number">
                </div>

                   <div class="col-md-6">
                    <label class="form-label">Address</label>
                    <input type="text" name="address" class="form-control" placeholder="Enter Your Address">
                </div>

                     <div class="col-md-6">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter Your Password">
                </div>

                     <div class="col-md-6">
                    <label class="form-label">Confirm Password</label>
                    <input type="password" name="confirm_password" class="form-control" placeholder="Enter Your confirm Password">
                </div>

    

         

            </div>
        </div>


        <div class="card-footer">
            <button type="submit" class="btn btn-info">Submit</button>
        </div>

    </form>

</div>

</div>
</div>
</main>

@endsection




