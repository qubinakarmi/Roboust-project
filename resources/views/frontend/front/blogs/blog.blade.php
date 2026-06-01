@extends('frontend.front.layouts.app')
@section('content')
    <div class="page-banner">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12">
                    <h1>Blog</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li>Blog</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="blog-section">
        <div class="container">
            <div class="row">

                @foreach ($blogs as $blog)
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                        <a href="{{ route('blogs.blog',$blog->slug) }}"><img src="{{ asset('blogs/'.$blog->images) }}"
                                alt=""> </a>
                        <div class="blog-content">
                            <ul>
                                <li><a href="#"><i class="fa fa-user"></i> {{  $blog->author->name }}</a> </li>
                                <li><a href="#"><i class="fa fa-calendar"></i> {{ $blog->created_at->format('m-d-Y') }}</a> </li>
                            </ul>
                            <h5><a href="{{ route('blogs.blog',$blog->slug) }}">{{ $blog->title }}</a> </h5>
                            <p>{{ Str::limit($blog->short_content, 80) }}
                        </div>
                    </div>
                @endforeach




                <!--
                    <div class="col-12 col-sm-12">
                        <div id="wrapper">
                            <ul id="border-pagination">
                                <li><a class="" href="#">«</a></li>
                                <li><a href="#">1</a></li>
                                <li><a href="#" class="active">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li><a href="#">6</a></li>
                                <li><a href="#">7</a></li>
                                <li><a href="#">»</a></li>
                            </ul>
                        </div>
                    </div>
                    -->
            </div>
        </div>
    </div>
@endsection
