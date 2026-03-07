@extends('admin.layouts.app2')
@section('title', 'Add Counter')

@section('content')

<main class="app-main">
<div class="app-content">
<div class="container-fluid">

<div class="card card-info card-outline">

<!-- Header -->
<div class="card-header">
<h3 class="card-title">Counter Form</h3>
</div>

<form action="" method="POST">
@csrf

<div class="card-body">
<div class="row g-3">

<!-- Title -->
<div class="col-md-12">
<label class="form-label">Title</label>
<input type="text" name="title" class="form-control">
</div>

<!-- Description -->
<div class="col-md-12">
<label class="form-label">Description</label>
<textarea id="editor" name="description" class="form-control"></textarea>
</div>

<!-- Number -->
<div class="col-md-12">
<label class="form-label">Number</label>
<input type="number" name="number" class="form-control" placeholder="Example: 500">
</div>

<!-- Prefix -->
<div class="col-md-12">
<label class="form-label">Prefix</label>
<input type="text" name="prefix" class="form-control" placeholder="Example: + or $">
</div>

<!-- Suffix -->
<div class="col-md-12">
<label class="form-label">Suffix</label>
<input type="text" name="suffix" class="form-control" placeholder="Example: + or K">
</div>

<!-- Icon -->
<div class="col-md-12">
<label class="form-label">Icon</label>
<input type="text" name="icon" class="form-control" placeholder="Example: fa-solid fa-users">
</div>

<!-- Status -->
<div class="col-md-12">
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
<button type="submit" class="btn btn-info">Save Counter</button>
</div>

</form>

</div>

</div>
</div>
</main>

@endsection