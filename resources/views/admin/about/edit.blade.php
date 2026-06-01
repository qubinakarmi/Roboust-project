@extends('admin.layouts.app2')

@section('title', 'Edit About Us')

@section('content')

<div class="container">

    <h2>Edit About Us</h2>

    <form action="{{ route('about.update',$about->id) }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Title</label>
            <input type="text"
                   name="title"
                   class="form-control"
                   value="{{ old('title',$about->title) }}">
        </div>

        <div class="mb-3">
            <label>Sub Title</label>
            <input type="text"
                   name="sub_title"
                   class="form-control"
                   value="{{ old('sub_title',$about->sub_title) }}">
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="detail_content"
                      class="form-control editor"
                      rows="5">{{ old('detail_content',$about->detail_content) }}</textarea>
        </div>

        <div class="mb-3">
            <label>Mission Title</label>
            <input type="text"
                   name="mission_title"
                   class="form-control "
                   value="{{ old('mission_title',$about->mission_title) }}">
        </div>

        <div class="mb-3">
            <label>Mission Description</label>
            <textarea name="mission_content"
                      class="form-control editor"
                      rows="4">{{ old('mission_content',$about->mission_content) }}</textarea>
        </div>

        <div class="mb-3">
            <label>Location Title</label>
            <input type="text"
                   name="location_title"
                   class="form-control"
                   value="{{ old('location_title',$about->location_title) }}">
        </div>

        <div class="mb-3">
            <label>Location Description</label>
            <textarea name="location_content"
                      class="form-control editor"
                      rows="4">{{ old('location_content',$about->location_content) }}</textarea>
        </div>

        <div class="mb-3">

            <label>Image</label>

       <x-image/>

            @if($about->image)
                <img src="{{ asset('abouts/'.$about->image) }}"
                     width="120"
                     class="mt-2">
            @endif

        </div>

        <button type="submit"
                class="btn btn-primary">
            Update
        </button>

    </form>

</div>

@endsection