@extends('admin.layouts.app2')
@section('title','List Testimonial ')
@section('content')

<div class="app-content mt-4">
    <div class="container-fluid">

        <div class="card">

            <!-- Card Header -->
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="card-title mb-0">Testimonials</h3>

                    {{-- create route --}}
                    <a href="{{ route('testimonial.index') }}" class="btn btn-success btn-sm">
                        Add New Testimonial
                    </a>
                </div>
            </div>

            <!-- Card Body -->
            <div class="card-body p-0">
                <table class="table table-striped table-hover mb-0">
                    <thead>
                        <tr>
                            <th>Client Name</th>
                            <th>Company / Position</th>
                            <th>Feedback</th>
                            <th>Rating</th>
                            <th>Status</th>
                            <th>Message</th>
                            <th>Image</th>
                            <th class="text-nowrap">Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td>Ram Sharma</td>
                            <td>ABC – Technical Director</td>
                            <td>Excellent service and great support!</td>
                            <td>⭐⭐⭐⭐⭐</td>
                            <td><span class="badge text-bg-success">Published</span></td>
                            <td>Highly recommended company.</td>
                            <td>
                                <img src="{{ asset('uploads/testimonials/ram.jpg') }}" width="60">
                            </td>

                            <td class="text-nowrap">
                                <a href="#" class="btn btn-primary btn-sm">Edit</a>

                                <button onclick="showAlert()" class="btn btn-danger btn-sm">Delete</button>

                            </td>
                        </tr>

                        <tr>
                            <td>Sita Gurung</td>
                            <td>JPG – Software Developer</td>
                            <td>Professional team and timely delivery.</td>
                            <td>⭐⭐⭐⭐</td>
                            <td><span class="badge text-bg-warning">Hidden</span></td>
                            <td>Will work again in future.</td>
                            <td>
                                <img src="{{ asset('uploads/testimonials/sita.jpg') }}" width="60">
                            </td>

                            <td class="text-nowrap">
                                <a href="#" class="btn btn-primary btn-sm">Edit</a>

                                <button onclick="showAlert()" class="btn btn-danger btn-sm">Delete</button>

                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>

            <!-- Card Footer -->
            <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-end">
                    <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
            </div>

        </div>

    </div>
</div>

@endsection