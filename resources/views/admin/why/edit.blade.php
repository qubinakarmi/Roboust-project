@extends('admin.layouts.app2')
@section('title', 'Edit WhyUs')

@section('content')

    <main class="app-main">
        <div class="app-content">
            <div class="container-fluid">

                <div class="card card-info card-outline">

                    <!-- Header -->
                    <div class="card-header">
                        <h3 class="card-title">Edit WhyUs</h3>
                    </div>
                    <!-- Form -->
                    <form action="{{ route('whyUs.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="card-body">
                            <div class="row g-3">

                        

                                <!-- Blog Title -->
                                <div class="col-md-12">
                                    <label class="form-label">Title</label>
                                    <input type="text" name="title" class="form-control" placeholder="Enter blog title"
                                        value="{{ old('title', $data->title) }}" required>

                                    @error('title')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>

                   



                                <div class="col-md-12">
                                    <label class="form-label">Description</label>
                                    <textarea name="description" rows="6" class="form-control editor" placeholder="Write blog short content here..."
                                        required style="color: black; min-height:300px;" required
                                        >{{ old('description', $data->description) }}</textarea>
                                    @error('description')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror

                                </div>


                      

                                <!-- Featured Image -->
                                <div class="col-md-12">
                                    <label class="form-label">Client Photo</label>
                                    <x-image />
                                    <span>current image</span>
                                    <img src="{{ asset('why/'.$data->image) }}" alt=""
                                        style="height:200px;width:400px;">


                                    @error('logo')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror

                                </div>




                               











                                <!-- Status -->
                                <div class="col-md-12">
                                    <label class="form-label">Status</label>
                                    <select name="status" class="form-select">
                                        <option value="1" {{ old('status', $data->status) == 1 ? 'selected' : '' }}>
                                            Published
                                        </option>
                                        <option value="0" {{ old('status', $data->status) == 0 ? 'selected' : '' }}>
                                            Pending
                                        </option>
                                    </select>


                                    @error('status')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>
                        </div>

                        <!-- Footer -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-info">Update </button>
                            <a href="{{ route('whyUs.create') }}" class="btn btn-secondary">Cancel</a>
                        </div>

                    </form>

                </div>

            </div>
        </div>
    </main>

@endsection
