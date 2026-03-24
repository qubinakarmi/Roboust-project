@extends('admin.layouts.app2')
@section('title', 'List Testimonial ')
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
                        <h3 class="card-title mb-0">Testimonials</h3>

                        {{-- create route --}}
                        <a href="{{ route('testimonial.create') }}" class="btn btn-success btn-sm">
                            Add New Testimonial
                        </a>
                    </div>
                </div>

                <!-- Card Body -->
                <div class="card-body p-0">
                    <table class="table table-striped table-hover mb-0">
                        <thead>
                            <tr>

                                <th>Company Name</th>
                                <th>Designation</th>
                                <th>Client Name</th>
                                <th>Message</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th class="text-nowrap">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($testimonials as $testimonial)
                                <tr>
                                    <td>{{ $testimonial->company_name ?? 'N/A' }}</td>
                                    <td>{{ $testimonial->designation ?? 'N/A' }}</td>
                                    <td>{{ $testimonial->client_name ?? 'N/A' }}</td>
                                    <td>{!! $testimonial->message ?? 'N/A' !!}</td>
                                    <td><img src="{{ isset($testimonial->image) ? asset('testimonials/' . $testimonial->image) : 'null' }}"
                                            alt="" style="height:100px;">
                                    </td>
                                    <td>

                                        <span class="badge {{ $testimonial->status === 1 ? 'bg-success' : 'bg-danger' }}">
                                            {{ $testimonial->status === 1 ? 'Published' : 'Hidden' }}
                                        </span>


                                    </td>
                                    <td class="text-nowrap">
                                        <a href="{{ route('testimonial.edit', $testimonial->id) }}"
                                            class="btn btn-primary btn-sm">Edit</a>
                                        <form action="{{ route('testimonial.destroy', $testimonial->id) }}" method="POST"
                                            class="delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>

                <!-- Card Footer -->
                <div class="card-footer clearfix">
                    <span class="pagination px-2">{{ $testimonials->links('pagination::bootstrap-5') }}</span>

                </div>

            </div>

        </div>
    </div>

@endsection
