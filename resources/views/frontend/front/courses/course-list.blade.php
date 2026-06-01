@extends('frontend.front.layouts.app')
@section('content')
    <div class="page-banner">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12">
                    <h1>Course Listing</h1>
                    <ul class="breadcrumb">
                        <li><a href="index.html">Home</a></li>
                        <li>Course Listing</li>
                    </ul>
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
                                <a href="{{ route('contact', 'sydney') }}" class="btn btn-enroll">Contact Us<i
                                        class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>


                    </div>
                @endforeach






            </div>
        </div>

    </div>

@endsection
