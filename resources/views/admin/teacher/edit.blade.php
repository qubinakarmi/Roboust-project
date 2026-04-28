@extends('admin.layouts.app2')
@section('title', 'Edit Teacher')

@section('content')

    <main class="app-main">
        <div class="app-content">
            <div class="container-fluid">

                <div class="card card-info card-outline">

                    <!-- Header -->
                    <div class="card-header">
                        <h3 class="card-title">Edit Teacher</h3>
                    </div>

                    <!-- Form -->
                    <form action="{{ route('teacher.update',$teacher->id) }}" method="POST" enctype="multipart/form-data"
                        data-parsley-validate novalidate>
                        @csrf
                        @method('PUT')

                        <div class="card-body">
                            <div class="row g-3">

                                <!-- Service Name -->
                                <div class="col-md-12">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control"
                                        placeholder="Enter teacher name" required value="{{ old('name',$teacher->name) }}">

                                    @error('name')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror


                                </div>



                                <div class="col-md-12">
                                    <label class="form-label">Subject</label>
                                    <input type="text" name="subject" class="form-control" placeholder="Enter subject"
                                        required value="{{ old('subject',$teacher->subject) }}">

                                    @error('subject')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>

  
                                <div class="col-md-12">
                                    <label class="form-label">Short Description</label>
                                    <textarea name="short_desc" placeholder="Enter your short_desc" class="form-control" required data-parsley-trigger="keyup" data-parsley-maxlength="120">{{ old('short_desc',$teacher->short_desc) }}</textarea>


                                    @error('short_desc')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>







                                <div class="col-md-12">
                                    <label class="form-label">Image</label>
                                    <x-image />

                               <p>
                                        Current Image
                                    </p>

                                    <img src="{{ asset('teachers/' . $teacher->image) }}" alt=""
                                        style="height: 200px; width:300xp;">

                                    @error('logo')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>



                            </div>




                              <div class="col-md-12">
                                <label>Status</label>
                                <select name="status" class="form-select">
                                    <option value="1" {{ old('status',$teacher->status)== 1 ?'selected': '' }}>Published</option>
                                    <option value="0" {{ old('status',$teacher->status)== 0 ?'selected': '' }}>Pending</option>
                                </select>
                            </div>
                        </div>
 
                        <!-- Footer -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-info">update teacher</button>
                            <a href="{{ route('teacher.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>

                    </form>

                </div>

            </div>
        </div>
    </main>

@endsection
