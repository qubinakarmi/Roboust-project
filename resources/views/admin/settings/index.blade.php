@extends('admin.layouts.app2')
@section('title','Setting')

@section('content')

<div class="app-content mt-4">
    <div class="container-fluid">

        <div class="card">
            
            <!-- Card Header -->
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="card-title mb-0">Businesses</h3>
                    <a href="{{ route('setting.index') }}" class="btn btn-success btn-sm">
                       Add settings
                    </a>
                </div>
            </div>

            <!-- Card Body -->
            <div class="card-body p-0">
                <table class="table table-striped table-hover mb-0">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Logo Image</th>
                            <th>Location</th>
                            <th>Contact Information</th>
                            <th style="width: 180px">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Business One</td>
                            <td><img src="{{ asset('images/logo1.png') }}" alt="Logo" style="width: 60px; height:auto;"></td>
                            <td>Kathmandu, Nepal</td>
                            <td>+977 9800000000<br>info@businessone.com</td>
                            <td>
                                <a href="" class="btn btn-primary btn-sm">Edit</a>
                                                              <button  onclick="showAlert()" class="btn btn-danger btn-sm">Delete</button>

                            </td>
                        </tr>

                        <tr>
                            <td>Business Two</td>
                            <td><img src="" alt="Logo" style="width: 60px; height:auto;"></td>
                            <td>Pokhara, Nepal</td>
                            <td>+977 9811111111<br>contact@businesstwo.com</td>
                            <td>
                                <a href="" class="btn btn-primary btn-sm">Edit</a>
                                                                <button  onclick="showAlert()" class="btn btn-danger btn-sm">Delete</button>

                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>

            <!-- Card Footer (Pagination) -->
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