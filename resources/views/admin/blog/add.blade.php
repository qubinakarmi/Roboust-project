@extends('admin.layouts.app2')

@section('title', 'Add Blog')

@section('content')
<main class="app-main">
    <div class="app-content">
        <div class="container-fluid">

            <div class="card card-info card-outline">

                <div class="card-header">
                    <h3 class="card-title">Add New Blog</h3>
                </div>

                <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data"
                      data-parsley-validate novalidate>
                    @csrf

                    <div class="card-body">
                        <div class="row g-3">

                            {{-- Author --}}
                            <div class="col-md-12">
                                <label>Author</label>
                                <select name="author_id" class="form-control" required>
                                    <option value="">Select Author</option>
                                    @foreach ($authors as $author)
                                        <option value="{{ $author->id }}">{{ $author->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Title --}}
                            <div class="col-md-12">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control"
                                       value="{{ old('title') }}" required>
                            </div>

                            {{-- Sub Title --}}
                            <div class="col-md-12">
                                <label>Sub Title</label>
                                <input type="text" name="sub_title" class="form-control"
                                       value="{{ old('sub_title') }}" required>
                            </div>

                            {{-- Short Content --}}
                            <div class="col-md-12">
                                <label>Short Content</label>
                                <textarea name="short_content" class="form-control" rows="5"
                                          required>{{ old('short_content') }}</textarea>
                            </div>

                            {{-- Blog Content --}}
                            <div class="col-md-12">
                                <label>Blog Content</label>
                                <textarea name="blog_content" id="blog_editor"
                                          class="form-control"
                                          required>{{ old('blog_content') }}</textarea>
                            </div>

                            {{-- Featured Image --}}
                            <div class="col-md-12">
                                <label>Featured Image</label>
                                <x-image />
                            </div>

                            {{-- Meta Title --}}
                            <div class="col-md-12">
                                <label>Meta Title</label>
                                <input type="text" name="meta_title" class="form-control"
                                       value="{{ old('meta_title') }}">
                            </div>

                            {{-- Tags --}}
                            <div class="col-md-12">
                                <label>Meta Keywords</label>

                                <input type="hidden" name="hidden_tags" id="hidden_tags">

                                <input type="text" id="tags_input" class="form-control tm-input"
                                       placeholder="Enter tags">

                                <small id="tag-error" style="color:red;"></small>
                            </div>

                            {{-- Meta Description --}}
                            <div class="col-md-12">
                                <label>Meta Description</label>
                                <textarea name="meta_description" id="meta_editor"
                                          class="form-control">{{ old('meta_description') }}</textarea>
                            </div>

                            {{-- Meta Image --}}
                            <div class="col-md-12">
                                <label>Meta Image</label>
                                <x-meta_image />
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