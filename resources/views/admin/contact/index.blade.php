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
            <a href="{{ route('contact.export') }}" class="btn btn-info"> <i class="fa-solid fa-download fa-xl"></i> </a>

            <div class="mb-3">
                <form action="{{ route('contacts.index') }}" method="GET">
                    <div class="d-flex justify-content-end align-items-center">

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
                <!-- Card Body -->
                <div class="card-body p-0">
                    <table class="table table-striped table-hover mb-0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Subject</th>
                                <th>Status</th>
                                <th>Created_at</th>
                                <th>Actions</th>
                                <th>Mail</th>
                            </tr>
                        </thead>
                        <tbody>


                            @foreach ($contacts as $contact)
                                <tr>
                                    <td>{{ $contact->name ?? 'N/A' }}</td>
                                    <td>{{ $contact->email ?? 'N/A' }}</td>
                                    <td>{{ $contact->phone ?? 'N/A' }}</td>
                                    <td>{{ $contact->subject ?? 'N/A' }}</td>
                                    <td>
                                        <span class="{{ $contact->status == 1 ? 'text-success' : 'text-danger' }}">
                                            {{ $contact->status == 1 ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>

                                    <td>{{ $contact->created_at->format('m-d-Y') ?? 'N/A' }}</td>

                                    <td>

                                        <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST"
                                            class="delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm "> <i
                                                    class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                    <td><a href="{{ route('vmail') }}" class="btn btn-success btn-sm"><i
                                                class="fa-solid fa-envelope"></i></a></td>
                                </tr>
                            @endforeach




                        </tbody>
                    </table>
                </div>
















                <!-- Card Footer -->
                <div class="card-footer clearfix">
                    <div class="d-flex justify-content-center">
                        <span class="pagination px-2">{{ $contacts->links('pagination::bootstrap-5') }}</span>
                    </div>
                </div>

            </div>

        </div>
    </div>

@endsection
