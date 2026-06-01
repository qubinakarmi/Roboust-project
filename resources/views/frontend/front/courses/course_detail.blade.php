@extends('frontend.front.layouts.app')
@section('content')
    <div class="page-banner">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12">
                    <h1>{{ $course->title }}</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li>{{ $course->sub_title }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="course-detail-section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-8 col-lg-8">

                    @if (!empty($course->course_info))
                        <div class="description">
                            {!! $course->course_info !!}
                        </div>
                    @endif

                    @if (!empty($course->career_outcome))
                        <div class="description">
                            {!! $course->career_outcome !!}
                        </div>
                    @endif

                    @if (!empty($course->tool))
                        <div class="description">
                            {!! $course->tool !!}
                        </div>
                    @endif

                    @if (!empty($course->certification))
                        <div class="description">
                            {!! $course->certification !!}
                        </div>
                    @endif



                </div>
                <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                    <!--<div class="detail-video">-->
                    <!--    <a href="#" class="btn btn-plays" data-bs-toggle="modal" data-bs-target="#exampleModal"><i-->
                    <!--            class="fa fa-play"></i> </a>-->
                    <!--</div>-->
                    <img src="{{ asset('courses/'.$course->image) }}" width="100%" height="" alt="{{ $course->title }}">
                </div>
                     @if (!empty($course->benefits))
                        <div class="description">
                            {!! $course->benefits !!}
                        </div>
                    @endif
            </div>
        </div>
    </div>

    <div class="modal fade video-popup" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Care Connect Tech | IT Training in Australia</h5>
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
