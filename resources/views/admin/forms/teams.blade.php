@extends('admin.layouts.app2')
@section('title', 'Add Team')

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
<form action="" method="POST" enctype="multipart/form-data">
@csrf

<div class="card-body">
<div class="row g-3">

<!-- Full Name -->
<div class="col-md-6">
<label class="form-label">Full Name</label>
<input type="text" name="name" class="form-control" placeholder="Enter full name" required>
</div>

<!-- Position -->
<div class="col-md-6">
<label class="form-label">Position</label>
<input type="text" name="position" class="form-control" placeholder="Example: Web Developer">
</div>

<!-- Email -->
<div class="col-md-6">
<label class="form-label">Email</label>
<input type="email" name="email" class="form-control" placeholder="Enter email">
</div>

<!-- Phone -->
<div class="col-md-6">
<label class="form-label">Phone</label>
<input type="text" name="phone" class="form-control" placeholder="Enter phone number">
</div>

<!-- Address -->
<div class="col-md-12">
<label class="form-label">Address</label>
<input type="text" name="address" class="form-control" placeholder="Enter address">
</div>

<!-- Bio / Description -->
<div class="col-md-12">
<label class="form-label">Short Bio</label>
<textarea id ="editor" name="bio" class="form-control" rows="3" placeholder="Write short introduction"></textarea>
</div>

<!-- Profile Image -->
<div class="col-md-12">
<label class="form-label">Profile Image</label>
<x-image action=""/>
</div>

<!-- Social Links -->
<div class="col-md-4">
<label class="form-label">LinkedIn</label>
<input type="text" name="linkedin" class="form-control" placeholder="LinkedIn URL">
</div>

<div class="col-md-4">
<label class="form-label">Twitter</label>
<input type="text" name="twitter" class="form-control" placeholder="Twitter URL">
</div>

<div class="col-md-4">
<label class="form-label">Facebook</label>
<input type="text" name="facebook" class="form-control" placeholder="Facebook URL">
</div>

<!-- Status -->
<div class="col-md-6">
<label class="form-label">Status</label>
<select name="status" class="form-control">
<option value="1">Active</option>
<option value="0">Inactive</option>
</select>
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