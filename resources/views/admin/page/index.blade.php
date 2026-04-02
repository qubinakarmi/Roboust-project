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
            <a href="{{ route('page.export') }}" class="btn btn-info"> <i class="fa-solid fa-download fa-xl"></i> Download
                Page
                Record</a>

            <div class="mb-3">
                <form action="{{ route('page.index') }}" method="GET">
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
                    <a href="{{ route('page.create') }}" class="btn btn-success  btn-sm p-2" id="btn"> <i
                            class="fa-solid fa-plus"></i> Add page content</a>

                </div>




                <!-- Card Body -->
                <div class="card-body p-0">
                    <table class="table table-striped table-hover mb-0">

                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Slug</th>

                                <th>Sub Title</th>
                                <th>Short Content</th>
                                <th>Detail Content</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th style="width:300px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pages as $page)
                                <tr>
                                    <td>{{ $page->title ?? 'N\A' }}</td>
                                    <td>{{ $page->slug ?? 'N\A' }}</td>
                                    <td>{{ $page->sub_title ?? 'N\A' }}</td>
                                    <td>{{ $page->short_content ?? 'N\A' }}</td>
                                    <td>{{ $page->detail_content ?? 'N\A' }}</td>
                                    <td><img src="{{ asset('pages/' . $page->image) }}" alt="{{ $page->title }}"
                                            style="height: 100px;width:100px;"></td>
                                    <td>
                                        @if ($page->status === 0)
                                            <span class="alert alert-warning p-1" role="alert">Hidden</span>
                                        @else
                                            <span class="alert alert-success p-1 text-black" role="alert">Published</span>
                                        @endif
                                    </td>

                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <div class="row">

                                                <div class="col-md-6">
                                                    <a href="{{ route('page.edit', $page->id) }}"
                                                        class="btn btn-warning btn-sm">
                                                        <i class="fa-solid fa-pen-to-square"></i> Edit
                                                    </a>
                                                </div>
                                                <div class="col-md-6">
                                                    <form action="{{ route('page.destroy', $page->id) }}" method="POST"
                                                        onsubmit="return confirm('Are you sure you want to delete this?')">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                            <i class="fa-solid fa-trash"></i> Delete
                                                        </button>
                                                    </form>
                                                </div>
                                                <div class="col-md-6 my-2">
                                                    <a href="{{ route('subpage.create', ['page_id' => $page->id]) }}"
                                                        class="btn btn-success btn-sm">
                                                        <i class="fa-solid fa-plus"></i> Subpage
                                                    </a>
                                                </div>
                                                <div class="col-md-6 my-2">
                                                    <a href="{{ route('subpage.index') }}"
                                                        class="btn btn-info btn-sm text-white">
                                                        <i class="fa-solid fa-eye"></i> View
                                                    </a>
                                                </div>
                                            </div>









                                        </div>

                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>










                <!-- Card Footer -->
                <div class="card-footer clearfix">
                    <div class="d-flex justify-content-center">
                        <span class="pagination px-2">{{ $pages->links('pagination::bootstrap-5') }}</span>
                    </div>
                </div>

            </div>

        </div>
    </div>

@endsection
