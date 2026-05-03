@extends('admin.layouts.app2')
@section('title', 'Add requirements')

@section('content')

    <main class="app-main">
        <div class="app-content">
            <div class="container-fluid">

                <div class="card card-info card-outline">

                    <!-- Header -->
                    <div class="card-header">
                        <h3 class="card-title">Add New Requirement</h3>
                    </div>

                    <!-- Form -->
                    <form action="{{ route('requirement.store') }}" method="POST" enctype="multipart/form-data"
                        data-parsley-validate novalidate>
                        @csrf

                        <div class="card-body">
                            <div class="row g-3">

                                <!-- Service Name -->
                                <div class="col-md-12">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control"
                                        placeholder="Enter requirement name" required>

                                    @error('name')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror


                                </div>
                                <div class="col-md-12">
                                    <label>Requirement Title</label>
                                    <select name="section_id" class="form-control" required>
                                        <option value="">Select title</option>
                                        @foreach ($sections as $section)
                                            <option value="{{ $section->id }}">{{ $section->title }}</option>
                                        @endforeach
                                    </select>
                                </div>






















                            </div>
                        </div>

                        <!-- Footer -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-info">Add Requirement</button>
                            <a href="{{ route('requirement.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>

                    </form>

                </div>

            </div>
        </div>
    </main>

@endsection
