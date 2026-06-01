@extends('admin.layouts.app2')

@section('title', 'About Us List')

@section('content')

<div class="container">

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="d-flex justify-content-between mb-3">

        <h2>About Us List</h2>

        <a href="{{ route('about.create') }}"
           class="btn btn-success">
            Add About Us
        </a>

    </div>

    <table class="table table-bordered">

        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Title</th>
                <th>Sub Title</th>
                <th>Mission</th>
                <th width="180">Action</th>
            </tr>
        </thead>

        <tbody>

            @forelse($abouts as $about)

                <tr>

                    <td>{{ $about->id }}</td>

                    <td>
                        @if($about->image)
                            <img src="{{ asset('abouts/'.$about->image) }}"
                                 width="80">
                        @endif
                    </td>

                    <td>{{ $about->title }}</td>

                    <td>{{ $about->sub_title }}</td>

                    <td>
                        {{ Str::limit($about->mission_content,50) }}
                    </td>

                    <td>

                        <a href="{{ route('about.edit',$about->id) }}"
                           class="btn btn-primary btn-sm">
                            Edit
                        </a>

                        <form action="{{ route('about.destroy',$about->id) }}"
                              method="POST"
                              style="display:inline-block;">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    onclick="return confirm('Delete this record?')"
                                    class="btn btn-danger btn-sm">
                                Delete
                            </button>

                        </form>

                    </td>

                </tr>

            @empty

                <tr>
                    <td colspan="6" class="text-center">
                        No Data Found
                    </td>
                </tr>

            @endforelse

        </tbody>

    </table>

    {{ $abouts->links() }}

</div>

@endsection