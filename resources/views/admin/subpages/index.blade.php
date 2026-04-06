@extends('admin.layouts.app2')
@section('title', 'List Sub Pages')

@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif



    <div class="app-content mt-4">
        <div class="container-fluid">
            <a href="{{ route('subpage.export') }}" class="btn btn-info"> <i class="fa-solid fa-download fa-xl"></i> Download
                Sub Content
                Record</a>

            <div class="mb-3">
                <form action="{{ route('subpage.index') }}" method="GET">
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


                <!-- Card Body -->
                <div class="card-body p-0">
                    <table class="table table-striped table-hover mb-0">

                        <thead>
                            <tr>
                                <th>Page_title</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Created_at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contents as $content)
                                <tr>
                                    <td>{{ $content->page->title }}</td>
                                    <td>{{ $content->title }}</td>
                                    <td>{!! $content->description !!} </td>

                                    <td><img src="{{ asset('contents/' . $content->image) }}" alt="{{ $content->title }}"
                                            style="height: 100px;width:100px;"></td>
                                    <td>
                                        @if ($content->status === 0)
                                            <span class="alert alert-warning p-1" role="alert">Hidden</span>
                                        @else
                                            <span class="alert alert-success p-1 text-black" role="alert">Published</span>
                                        @endif
                                    </td>
                                    <td>{{ $content->created_at->format('m-d-Y') ?? 'N/A' }}</td>

                                    <td>

                                        <a href="{{ route('subpage.edit', $content->id) }}"
                                            class="btn btn-warning">edit</a>

                                        <form action="{{ route('subpage.destroy', $content->id) }}" method="POST"
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










             

            </div>
            <div class="my-2">

                <a href="{{ route('page.index') }}" class="btn btn-success my-2s"> <i
                        class="fa-solid fa-arrow-left-long"></i> Back to Page</a>
            </div>
        </div>
    </div>

@endsection
