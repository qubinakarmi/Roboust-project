@extends('admin.layouts.app2')
@section('title','List Services')

@section('content')

<div class="app-content mt-4">
    <div class="container-fluid">

        <div class="card">

            <!-- Card Header -->
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="card-title mb-0">Services</h3>
                    <a href="{{ route('services.index') }}" class="btn btn-success btn-sm">
                        Add New Service
                    </a>
                </div>
            </div>

            <!-- Card Body -->
            <div class="card-body p-0">
                <table class="table table-striped table-hover mb-0">
                    <thead>
                        <tr>
                            <th style="width: 60px">#</th>
                            <th>Service Name</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th style="width: 180px">Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td>1</td>
                            <td>Web Development</td>
                            <td>Building modern and responsive websites.</td>
                            <td>abcd</td>
                            <td><img src="" alt=""></td>
                            <td><span class="badge text-bg-success">Active</span></td>
                            <td>
                                <a href="{{ route('services') }}" class="btn btn-primary btn-sm">Edit</a>
                                                                 <button  onclick="showAlert()" class="btn btn-danger btn-sm">Delete</button>

                            </td>
                        </tr>

                        <tr>
                            <td>2</td>
                            <td>Cloud Migration</td>
                            <td>Secure migration of systems to the cloud.</td>
                                <td>abcd</td>
                            <td><img src="" alt=""></td>
                            <td><span class="badge text-bg-warning">Inactive</span></td>
                            <td>
                                <a href="{{ route('services') }}" class="btn btn-primary btn-sm">Edit</a>
                                    <button  onclick="showAlert()" class="btn btn-danger btn-sm">Delete</button>
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