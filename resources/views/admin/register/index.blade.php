@extends('admin.layouts.app2')
@section('title', 'List Register')

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

        

                <!-- Card Body -->
                <div class="card-body p-0">
                    <table class="table table-striped table-hover mb-0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>


                            @foreach ($registers as $register)
                                <tr>
                                    <td>{{ $register->name }}</td>
                                    <td>{{ $register->email }}</td>
                                    <td>{{ $register->phone }}</td>
                                    <td>{{ $register->address }}</td>
                                    <td> <span class="badge {{ $register->status === 1 ? 'bg-success' : 'bg-danger' }}">
                                            {{ $register->status === 1 ? 'Active' : 'InActive' }}
                                        </span>
                                    </td>
                                    <td>
                                        {{-- <a href="{{ route('reg.edit', $register->id) }}"
                                            class="btn btn-primary btn-sm">Edit</a> --}}
                                        <form action="{{ route('reg.destroy', $register->id) }}" method="POST"
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
                    <span class="pagination px-2">{{ $registers->links('pagination::bootstrap-5') }}</span>

                </div>


            </div>

        </div>
    </div>

@endsection
