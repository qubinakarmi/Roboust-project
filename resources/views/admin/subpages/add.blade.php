@extends('admin.layouts.app2')
@section('title', 'Add Slider')

@section('content')

    <main class="app-main">
        <div class="app-content">
            <div class="container-fluid">

                <div class="card card-info card-outline">

                    <!-- Header -->
                    <div class="card-header">
                        <h3 class="card-title">Add New Sub Content</h3>
                    </div>

                    <!-- Form -->
                    <form action="{{ route('subpage.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="card-body">
                            <div class="row g-3">

                                <!-- Slider Title  -->
                                <div class="col-md-12">
                                    <label class="form-label">Title</label>
                                    <input type="text" name="title" class="form-control" placeholder="Enter title"
                                        value="{{ old('title') }}">

                                    @error('title')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>
                        


                                     <div class="col-md-12">
                                    <label class="form-label">Description</label>
                                    <textarea id="editor" name="description"  class="form-control" placeholder="Enter a Description">{{ old('description') }}</textarea>
                                    @error('description')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="col-md-12">
                                    <label class="form-label">Image</label>
                                    <x-image action="" />

                                    @error('logo')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label">Status</label>

                                    <select name="status" id="" class="form-control">

                                        <option value="1">Published</option>
                                        <option value="0">Hidden</option>

                                    </select>



                                </div>







                            </div>
                        </div>

                        <!-- Footer -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-info">Add Content</button>
                            <a href="" class="btn btn-secondary">Cancel</a>
                        </div>

                    </form>

                </div>

            </div>
        </div>
    </main>

@endsection
