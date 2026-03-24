@extends('admin.layouts.app2')
@section('title', 'List Services')

@section('content')

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="app-content mt-4">
        <div class="container-fluid">


            <div class="card">


                <!-- Card Header -->
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="card-title mb-0">Services</h3>
                        <a href="{{ route('service.create') }}" class="btn btn-success btn-sm">
                            Add New Service
                        </a>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body p-0">
                    <table class="table table-striped table-hover mb-0">
                        <thead>
                            <tr>

                                <th>Title</th>
                                <th>Category Name</th>
                                <th>Slug</th>
                                <th>Sub Title</th>
                                <th>Short description</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th style="width: 180px">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($services as $service)
                                <tr>

                                    <td>{{ $service->title ?? 'N/A' }}</td>
                                    <td>{{ $service->category->name ?? 'N/A'}}</td>
                                    <td>{{ $service->slug ?? 'N/A' }}</td>
                                    <td>{{ $service->sub_title ?? 'N/A' }}</td>
                                    <td>{{ $service->short_desc ?? 'N/A' }}</td>
                                    <td>{{ $service->description ?? 'N/A' }}</td>
                                    <td>
                                        @if (isset($service->image) && $service->image)
                                            <img src="{{ isset($service->image) ? asset('services/' . $service->image): 'null'}}" width="80">
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td>

                                        <span class="badge {{ $service->status === 1 ? 'bg-success' : 'bg-danger' }}">
                                            {{ $service->status === 1 ? 'Active' : 'InActive' }}
                                        </span>


                                    </td>
                                    <td>
                                        <a href="{{ route('service.edit', $service->id) }}"
                                            class="btn btn-primary btn-sm">Edit</a>
                                        <form action="{{ route('service.destroy', $service->id) }}" method="POST"
                                            class="delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm my-2">Delete</button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>

                <!-- Card Footer -->
                {{-- <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-end">
                        <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                    </ul>
                </div> --}}

            </div>

        </div>
    </div>

@endsection
