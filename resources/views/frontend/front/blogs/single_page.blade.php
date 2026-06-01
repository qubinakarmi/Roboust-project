@extends('frontend.front.layouts.app')
@section('content')
{{-- {{ dd($blog) }} --}}
    <div class="page-banner">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12">
                    <h1>{{ $blog->title ?? 'N/A' }}</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li>{{ $blog->title ?? 'N/A' }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="course-detail-section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-8 col-lg-8">
                    <div class="description">
                        {!!$blog->blog_content !!}

                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                    <!--<div class="detail-video">-->
                    <!--    <a href="#" class="btn btn-plays" data-bs-toggle="modal" data-bs-target="#exampleModal"><i-->
                    <!--            class="fa fa-play"></i> </a>-->
                    <!--</div>-->
                    <img src="{{ asset('blogs/'.$blog->images) }}" width="100%" height="" alt="Cloud Computing">
                </div>
            </div>
        </div>
    </div>
   <div class="course-secton">
        <div class="container">
            <div class="row">

                <div class="col-12 col-sm-12">
                    @foreach ($programs as $program)
                        <h2>{{ $program->title ?? 'N\A' }}</h2>
                        <p class="course-text">{{ $program->short_desc ?? 'N\A' }}
                        </p>
                    @endforeach

                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-12">
                    <h3>Career Boosting Course <a href="{{ route('courses.course-list') }}">View more <i
                                class="fa fa-arrow-right"></i> </a>
                    </h3>
                </div>
                @foreach ($courses as $course)
                    <div class="col-6 col-sm-6 col-md-6 col-lg-4 col-xl-3">
                        <div class="course-box">
                            <a href="{{ route('courses.course_detail', $course->slug) }}">
                                <img src="{{ asset('courses/' . $course->image) }}" alt="">
                            </a>
                            <div class="course-content">
                                <h4><a
                                        href="{{ route('courses.course_detail', $course->slug) }}">{{ $course->title }}</a>
                                </h4>
                                <p><i class="fa fa-calendar"></i> Duration: <strong> {{ $course->duration }} </strong>
                                </p>
                                <a href="" class="btn btn-enroll">Contact Us<i
                                        class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>


                    </div>
                @endforeach






            </div>
        </div>

    </div>

    <div class="modal fade video-popup" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Care Connect Tech | IT Training in Sydney</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <iframe width="100%" height="350"
                        src="https://www.youtube.com/embed/36IIHOestzY?si=55AIsl5oQ95Cca8Z" title="YouTube video player"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen=""></iframe>
                </div>
            </div>
        </div>
    </div>

@endsection
