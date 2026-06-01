@extends('admin.layouts.app2')

@section('title', 'Edit Certificate')

@section('content')
<main class="app-main">
    <div class="app-content">
        <div class="container-fluid">

            <div class="card card-info card-outline">

                <div class="card-header">
                    <h3 class="card-title">Edit New Certificate</h3>
                </div>

                <form action="{{ route('certificate.update',$certificate->id) }}" method="POST" enctype="multipart/form-data"
                      data-parsley-validate novalidate>
                    @csrf
                    @method('PUT')

                    <div class="card-body">
                        <div class="row g-3">


                            {{-- Title --}}
                            <div class="col-md-12">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control"
                                       value="{{ old('title',$certificate->title) }}" required>
                            </div>

                     

                            {{-- Short Content --}}
                            <div class="col-md-12">
                                <label>Short Content</label>
                                <textarea name="short_desc" class="form-control" rows="5"
                                          required>{{ old('short_desc',$certificate->short_desc) }}</textarea>
                            </div>

                     

                            {{-- Featured Image --}}
                            <div class="col-md-12">
                                <label>Featured Image</label>
                                <x-image />

                                                                 <span>current image</span>
                                    <img src="{{ asset('certificates/' . $certificate->image) }}" alt=""
                                        style="height:200px;width:400px;">


                                    @error('logo')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                            </div>

                         
                           <!-- Status -->
                                <div class="col-md-12">
                                    <label class="form-label">Status</label>
                                    <select name="status" class="form-select">
                                        <option value="1" {{ old('status', $certificate->status) == 1 ? 'selected' : '' }}>
                                            Published
                                        </option>
                                        <option value="0" {{ old('status', $certificate->status) == 0 ? 'selected' : '' }}>
                                            Pending
                                        </option>
                                    </select>


                                    @error('status')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>

                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">Update Certificate</button>
                    </div>

                </form>

            </div>

        </div>
    </div>
</main>
@endsection