@extends('admin.layouts.app2')
@section('title', 'List Register')

@section('content')

    <div class="app-content mt-4">
        <div class="container-fluid">

            <a href="{{ route('team.export') }}" class="btn btn-info my-2"> <i class="fa-solid fa-download fa-xl"></i></a>

            <div class="mb-3">
                <form action="{{ route('team.index') }}" method="GET">
                    <div class="d-flex justify-content-center align-items-center">
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
                        <h3 class="card-title mb-0">Teams</h3>
                        <a href="{{ route('team.create') }}" class="btn btn-success btn-sm">
<i class="fa-solid fa-plus"></i>                        </a>
                    </div>
                </div>

                <!-- Card Body -->
                <div class="card-body p-0">
                    <!-- Responsive Table Wrapper -->
                    <div class="table-responsive">
                        <table class="table table-striped table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>Designation</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Created_at</th>

                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($teams as $team)
                                    <tr>
                                        <td>{{ $team->designation ?? 'N/A' }}</td>
                                        <td>{{ $team->full_name ?? 'N/A' }}</td>
                                        <td>{{ $team->email ?? 'N/A' }}</td>
                                        <td>{{ $team->phone ?? 'N/A' }}</td>
                                        <td>
                                            @if ($team->image)
                                                <img src="{{ asset('teams/' . $team->image) }}" alt="Team Image"
                                                    style="height:150px;width:200px;">
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                       
                                        <td>

                                            <span class="badge {{ $team->status === 1 ? 'bg-success' : 'bg-danger' }}">
                                                {{ $team->status === 1 ? 'Active' : 'InActive' }}
                                            </span>


                                        </td>
                                        <td>{{ $team->created_at->format('m-d-Y') }}</td>
                                        <td>
                                            <div class="d-flex">
                                            <a href="{{ route('team.edit', $team->id) }}"
                                                class="btn btn-warning btn-sm mb-1"><i class="fa-regular fa-pen-to-square"></i></a>
                                            <form action="{{ route('team.destroy', $team->id) }}" method="POST"
                                                class="delete-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm mx-2"><i class="fa-solid fa-trash"></i></button>
                                            </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- End Table Responsive -->
                </div>

                <!-- Card Footer -->
                <div class="card-footer clearfix">
                    {{ $teams->links('pagination::bootstrap-5') }}
                </div>

            </div>

        </div>
    </div>

@endsection
