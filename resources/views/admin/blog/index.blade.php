@extends('admin.layouts.app2')
@section('title', 'Blog List')

@section('content')
    <div class="app-content mt-4">
        <div class="container-fluid">



            <form action="" method="POST" enctype="multipart/form-data"
                style="display: none;  " id="adding" >
                <div id="btn1"
                    style="border: none;   box-shadow: 10px 10px 5px lightblue;
 background-color:#ffffff; font-size:2rem; padding:0 10px 0 10px; color:rgb(0, 0, 0); cursor: pointer; border-radius:10px;display:flex;justify-content:flex-end; padding-left:20px;">
                    X </div>


                @csrf

                <div class="card-body">
                    <div class="row g-3">

                        <!-- Blog Title -->
                        <div class="col-md-12">
                            <label class="form-label">Blog Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Enter blog title"
                                required>
                        </div>

                        <!-- Author -->
                        <div class="col-md-6">
                            <label class="form-label">Author Name</label>
                            <input type="text" name="author" class="form-control" placeholder="Enter author name">
                        </div>

                        <!-- Status -->
                        <div class="col-md-6">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-select">
                                <option value="published">Published</option>
                                <option value="draft">Draft</option>
                            </select>
                        </div>

                        <!-- Blog Content -->
                        <div class="col-md-12">
                            <label class="form-label">Blog Content</label>
                            <textarea name="content" rows="6" class="form-control" placeholder="Write blog content here..." required></textarea>
                        </div>

                        <!-- Featured Image -->
                        <div class="col-md-12">
                            <label class="form-label">Featured Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>

                    </div>
                </div>

                <!-- Footer -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-info">Publish Blog</button>
                    <a href="{{ route('blogs.index') }}" class="btn btn-secondary">Cancel</a>
                </div>

            </form>

            <div class="card">

                <!-- Card Header -->
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="card-title mb-0">Blog Posts</h3>
                        {{-- <a href="" class="btn btn-success btn-sm" id="btn">
                        Add New Blog
                    </a> --}}
                        <button id="btn" class="btn btn-success btn-sm"> Add New Blog</button>
                    </div>
                </div>

                <!-- Card Body -->
                <div class="card-body p-0">
                    <table class="table table-striped table-hover mb-0">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Content</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th style="width: 180px">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>My First Blog</td>
                                <td>John Doe</td>
                                <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut sequi hic illo voluptatem?
                                    Et ratione, quam labore laudantium amet mollitia quae pariatur? Saepe, tenetur veritatis
                                    est commodi vero expedita accusamus!</td>
                                <td>img2</td>
                                <td><span class="badge text-bg-success">Published</span></td>
                                <td>
                                    <a href="{{ route('blogs') }}" class="btn btn-primary btn-sm">Edit</a>




                                    <button onclick="showAlert()" class="btn btn-danger btn-sm">Delete</button>
                                </td>
                            </tr>

                            <tr>
                                <td>Laravel Tips</td>
                                <td>Jane Smith</td>
                                <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut voluptate eius, vel nemo
                                    reiciendis odio unde, officiis delectus repudiandae minima aut assumenda necessitatibus
                                    rerum omnis maxime mollitia, deleniti pariatur in?</td>

                                <td>img1</td>
                                <td><span class="badge text-bg-warning">Draft</span></td>
                                <td>
                                    <a href="{{ route('blogs') }}" class="btn btn-primary btn-sm">Edit</a>
                                    <button onclick="showAlert()" class="btn btn-danger btn-sm">Delete</button>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>

                <!-- Card Footer (Pagination) -->
                <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-end">
                        <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                    </ul>
                </div>

            </div>

        </div>
    </div>



    </div>



    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        $(document).ready(function() {

            $("#btn").click(function() {
                $("#adding").fadeIn(1000); // shows form smoothly
            });

            $("#btn1").click(function() {
                $("#adding").fadeOut(1000); // shows form smoothly
            });

            // shows form smoothly

        });
    </script>


@endsection
