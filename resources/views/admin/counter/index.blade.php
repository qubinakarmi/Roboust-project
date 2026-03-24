@extends('admin.layouts.app2')
@section('title', 'Counter List ')
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
                        <a href="{{ route('counter.create') }}" class="btn btn-success btn-sm">
                            Add Counter
                        </a>
                    </div>
                </div>

                <!-- Card Body -->
                <div class="card-body p-0">
                    <table class="table table-striped table-hover mb-0">
                        <thead>
                            <tr>

                                <th>Title</th>
                                <th>Description</th>
                                <th>Number</th>
                                <th>Prefix</th>
                                <th>Suffix</th>
                                <th>Status</th>
                                <th class="text-nowrap">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($counters as $counter)
                                <tr>
                                    <td>{{ $counter->title ?? 'N/A' }}</td>
                                    <td>
                                        {!! !empty($counter->description) ? Str::limit(strip_tags($counter->description), 50) : 'N/A' !!}
                                    </td>
                                    <td>{{ $counter->number ?? 'N/A' }}</td>
                                    <td>{{ $counter->prefix ?? 'N/A' }}</td>
                                    <td>{{ $counter->suffix ?? 'N/A' }} </td>


                                    <td>

                                        <span class="badge {{ $counter->status === 1 ? 'bg-success' : 'bg-danger' }}">
                                            {{ $counter->status === 1 ? 'Active' : 'InActive' }}
                                        </span>


                                    </td>

                                    <td class="text-nowrap">
                                        <a href="{{ route('counter.edit', $counter->id) }}"
                                            class="btn btn-primary btn-sm">Edit</a>
                                        <form action="{{ route('counter.destroy', $counter->id) }}" method="POST"
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
                    <span class="pagination px-2">{{ $testimonials->links('pagination::bootstrap-5') }}</span>

                </div> --}}

            </div>

        </div>
    </div>

@endsection
