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

            <a href="{{ route('service.export') }}" class="btn btn-info"> <i class="fa-solid fa-download fa-xl"></i> Download
                Services</a>



            <div class="mb-3">
                <form action="{{ route('service.index') }}" method="GET">
                    <div class="d-flex justify-content-center align-items-centeralign-items-center">


                        <!-- Search input -->
                        <input type="text" name="search" placeholder="Search" class="form-control me-2 w-25"
                            value="{{ request('search') }}">

                        <!-- Status filter -->
                        <select name="status" class="form-control me-2 w-25">
                            <option value="">Select Status</option>
                            <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ request('status') == '0' ? 'selected' : '' }}>Inactive</option>
                        </select>
                        <button type="submit" class="btn btn-success mx-2">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>

                    </div>
                </form>
            </div>

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
                                <th>Sub Title</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th style="width: 180px">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($services as $service)
                                <tr>

                                    <td>{{ $service->title ?? 'N/A' }}</td>
                                    <td>{{ $service->category->name ?? 'N/A' }}</td>
                                    <td>{{ $service->sub_title ?? 'N/A' }}</td>

                                    <td>
                                        @if (isset($service->image) && $service->image)
                                            <img src="{{ isset($service->image) ? asset('services/' . $service->image) : 'null' }}"
                                                width="80">
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td>


                                        <!-- Include jQuery -->
                                        {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

   
   
   
   
                                        <select 
    class="status-dropdown form-control text-white p-1 {{ $service->status == 1 ? 'bg-success':'bg-danger'  }}" 
    data-id="{{ $service->id }}      "
>
    <option value="1" {{ $service->status == 1 ? 'selected' : '' }} >Active</option>
    <option value="0" {{ $service->status == 0 ? 'selected' : '' }}>Inactive</option>
</select> --}}





                                        {{-- <script>
$(document).ready(function() {
    $('.status-dropdown').change(function() {
        var status = $(this).val();
        var itemId = $(this).data('id');
        
      
    });
});
</script> --}}






                                        <span class="badge {{ $service->status === 1 ? 'bg-success' : 'bg-danger' }}">
                                            {{ $service->status === 1 ? 'Active' : 'InActive' }}
                                        </span>


                                    </td>
                                    <td>{{ $service->created_at->format('m-d-Y') }}</td>
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
                <div class="card-footer clearfix">
                    <span class="pagination px-2">{{ $services->links('pagination::bootstrap-5') }}</span>

                </div>

            </div>

        </div>
    </div>

@endsection
