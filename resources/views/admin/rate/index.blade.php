@extends('admin.layouts.app2')
@section('title', 'Rate List')

@section('content')
    <div class="app-content mt-4">
        <div class="container-fluid">



            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            {{-- <a href="{{ route('blog.export') }}" class="btn btn-info">
                <i class="fa-solid fa-download fa-xl"></i>
            </a> --}}












            <div class="card">

                <!-- Card Header -->
                <div class="card-header">
                    <h3 class="card-title mb-0">Rate</h3>




                </div>

                <!-- Card Body -->
                <div class="card-body p-0">
                    <div class="table-responsive">

                        <table class="table table-striped table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>Course Name</th>
                                    <th>Rating</th>
                                    <th>Created_at</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rates as $rate)
                                <tr>
                                    <td>{{ $rate->course->title }}</td>
                                    <td>{{ $rate->rate }}</td>
                                    <td>{{ $rate->created_at->format('d/m/Y') }}</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>




                <!-- Card Footer -->
                {{-- <div class="card-footer clearfix">
                    <div class="d-flex justify-content-center">
                        <span class="pagination px-2">{{ $blogs->links('pagination::bootstrap-5') }}</span>
                    </div>
                </div> --}}

            </div>

        </div>
    </div>










@endsection
