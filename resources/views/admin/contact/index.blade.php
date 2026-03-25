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

            <div class="card">

                <!-- Card Header -->
                {{-- <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="card-title mb-0">Contact</h3>
                        <a href="" class="btn btn-success btn-sm">
                            Add New Contact
                        </a>
                    </div>
                </div> --}}

                <!-- Card Body -->
                <div class="card-body p-0">
                    <table class="table table-striped table-hover mb-0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Subject</th>
                                <th>Description</th>
                                <th>Status</th>
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
                                    <td>{{ $contact->description ?? 'N/A' }}</td>
                                    <td>
                                        <span class="{{ $contact->status == 1 ? 'text-success' : 'text-danger' }}">
                                            {{ $contact->status == 1 ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                    <td>

                                        <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST"
                                            class="delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm my-2">Delete</button>
                                        </form>
                                    </td>
                                    <td><a href="{{ route('vmail') }}" class="btn btn-success">Mail</a></td>
                                </tr>
                            @endforeach




                        </tbody>
                    </table>
                </div>
















                <!-- Card Footer -->
                <div class="card-footer clearfix">
                    <span class="pagination px-2">{{ $contacts->links('pagination::bootstrap-5') }}</span>

                </div>

            </div>

        </div>
    </div>

@endsection
