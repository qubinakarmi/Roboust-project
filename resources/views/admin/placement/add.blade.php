@extends('admin.layouts.app2')

@section('title', 'Add placement')

@section('content')
<main class="app-main">
    <div class="app-content">
        <div class="container-fluid">

            <div class="card card-info card-outline">

                <div class="card-header">
                    <h3 class="card-title">Add New placement</h3>
                </div>

                <form action="{{ route('place.store') }}" method="POST" enctype="multipart/form-data"
                      data-parsley-validate novalidate>
                    @csrf

                    <div class="card-body">
                        <div class="row g-3">



                            {{-- Title --}}
                            <div class="col-md-12">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control"
                                       value="{{ old('title') }}" required>
                            </div>



                            {{-- Short Content --}}
                            <div class="col-md-12">
                                <label>Short Content</label>
                                <textarea name="short_desc" class="form-control" rows="5"
                                          required>{{ old('short_desc') }}</textarea>
                            </div>

                   

                            {{-- Featured Image --}}
                            <div class="col-md-12">
                                <label>Featured Image</label>
                                <x-image />
                            </div>

                            {{-- Status --}}
                            <div class="col-md-12">
                                <label>Status</label>
                                <select name="status" class="form-select">
                                    <option value="1">Published</option>
                                    <option value="0" selected>Pending</option>
                                </select>
                            </div>

                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">Publish Blog</button>
                    </div>

                </form>

            </div>

        </div>
    </div>
</main>
@endsection