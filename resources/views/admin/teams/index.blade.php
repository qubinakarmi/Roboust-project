@extends('admin.layouts.app2')
@section('title', 'List Register')

@section('content')

<div class="app-content mt-4">
    <div class="container-fluid">

        <div class="card">

            <!-- Card Header -->
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="card-title mb-0">Teams</h3>
                    <a href="{{ route('team.create') }}" class="btn btn-success btn-sm">
                        Add Team Member
                    </a>
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
                                <th>Address</th>
                                <th>Short Bio</th>
                                <th>Image</th>
                                <th>LinkedIn</th>
                                <th>Twitter</th>
                                <th>Facebook</th>
                                <th>Ordering</th>
                                <th>Status</th>
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
                                    <td>{{ $team->address ?? 'N/A' }}</td>
                                    <td>{!! $team->short_bio ?? 'N/A' !!}</td>
                                    <td>
                                        @if ($team->image)
                                            <img src="{{ asset('teams/' . $team->image) }}" alt="Team Image"   style="height:150px;width:200px;">
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td>{{ $team->linkedin ?? 'N/A' }}</td>
                                    <td>{{ $team->twitter ?? 'N/A' }}</td>
                                    <td>{{ $team->facebook ?? 'N/A' }}</td>
                                    <td>{{ $team->ordering ?? 'N/A' }}</td>
                       <td>

                                        <span class="badge {{ $team->status === 1 ? 'bg-success' : 'bg-danger' }}">
                                            {{ $team->status === 1 ? 'Active' : 'InActive' }}
                                        </span>


                                    </td>                                    <td>
                                        <a href="{{ route('team.edit', $team->id) }}" class="btn btn-primary btn-sm mb-1">Edit</a>
                 <form action="{{ route('team.destroy', $team->id) }}" method="POST"
                                            class="delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm my-2">Delete</button>
                                        </form>                                    </td>
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