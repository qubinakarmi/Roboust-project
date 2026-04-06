@extends('admin.layouts.app2')
@section('title', 'List Slider')

@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif



    <div class="app-content mt-4">
        <div class="container-fluid">
            <a href="{{ route('slider.export') }}" class="btn btn-info"> <i class="fa-solid fa-download fa-xl"></i> Download
                Slider
                Record</a>

            <div class="mb-3">
                <form action="{{ route('slider.index') }}" method="GET">
                    <div class="d-flex justify-content-end align-items-center">

                        <!-- Search input -->
                        <input type="text" name="search" placeholder="Search" class="form-control me-2 w-25"
                            value="{{ request('search') }}">

                        <!-- Status filter -->
                        <select name="status" class="form-control me-2 w-25">
                            <option value="">Select Status</option>
                            <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>Published</option>
                            <option value="0" {{ request('status') == '0' ? 'selected' : '' }}>Hidden</option>
                        </select>

                        <button type="submit" class="btn btn-success mx-2">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>

                    </div>
                </form>
            </div>

            <div class="card">
                <div class=" d-flex justify-content-start align-item-start p-2">
                    <a href="{{ route('slider.create') }}" class="btn btn-success  btn-sm p-2" id="btn"> <i
                            class="fa-solid fa-plus"></i> Add Slider</a>

                </div>

                <!-- Card Body -->
                <div class="card-body p-0">
                    <table class="table table-striped table-hover mb-0">

                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Sub Title</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Created_at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sliders as $slider)
                                
                           

                            <tr>
                                <td>{{ $slider->title ?? 'N\A' }}</td>

                                <td>{{ $slider->sub_title ?? 'N\A' }}</td>

    

                                <td><img src="{{ asset('sliders/' . $slider->image) }}" alt="{{ $slider->title }}"
                                        style="height: 100px;width:100px;"></td>
                                <td>
                                    @if ($slider->status === 0)
                                        <span class="alert alert-warning p-1" role="alert">Hidden</span>
                                    @else
                                        <span class="alert alert-success p-1 text-black" role="alert">Published</span>
                                    @endif
                                </td>
                                <td>{{ $slider->created_at->format('m-d-Y') }}</td>

                                <td>

                                    <a href="{{ route('slider.edit', $slider->id) }}" class="btn btn-warning">edit</a>

                                    <form action="{{ route('slider.destroy', $slider->id) }}" method="POST"
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
                    <div class="d-flex justify-content-center">
                        <span class="pagination px-2">{{ $sliders->links('pagination::bootstrap-5') }}</span>
                    </div>
                </div>

            </div>

        </div>
    </div>

@endsection
