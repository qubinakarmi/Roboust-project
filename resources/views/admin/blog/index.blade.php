@extends('admin.layouts.app2')
@section('title', 'Blog List')

@section('content')
    <div class="app-content mt-4">
        <div class="container-fluid">





            <div class="card">

                <!-- Card Header -->
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="card-title mb-0">Blog Posts</h3>
                        <a href="{{ route('blogs.index') }}" class="btn btn-success btn-sm" id="btn">
                            Add New Blog
                        </a>
                    </div>
                </div>

                <!-- Card Body -->
                <div class="card-body p-0">
                    <table class="table table-striped table-hover mb-0">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Sub Title</th>
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
                                <td>any</td>
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



  



    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>



@endsection
