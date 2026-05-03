@extends('frontend.layouts.app')

@section('title', 'Home Page')

@section('content')


    <div class="hero-slide owl-carousel site-blocks-cover">
        @foreach ($slider as $item)
            @if ($item->status == 1)
                <div class="intro-section" style="background-image: url({{ asset('sliders/' . $item->image) }});">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-12 mx-auto text-center" data-aos="fade-up">
                                <h1>{{ $item->title }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach



    </div>



    {{-- end of slider --}}




    <div class="site-section">
        <div class="container">
            <div class="row mb-5 justify-content-center text-center">
                <div class="col-lg-4 mb-5">
                    <h2 class="section-title-underline mb-5">
                        <span>Why Academics Works</span>
                    </h2>
                </div>
            </div>
            <div class="row">

                @foreach ($services as $service)
                    <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">

                        <div class="feature-1 border">
                            <div class="my-2 mx-2 d-flex justify-content-center">
                                <img src="{{ asset('services/' . $service->image) }}" alt=""
                                    style="height:200px; width:300px;">
                            </div>
                            <div class="feature-1-content">
                                <h2>{{ $service->title }}</h2>
                                <p>{{ $service->short_desc }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>







        </div>
    </div>
    </div>






    <div class="site-section">
        <div class="container">


            <div class="row mb-5 justify-content-center text-center">
                <div class="col-lg-6 mb-5">
                    <h2 class="section-title-underline mb-3">
                        <span>Popular Courses</span>
                    </h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia, id?</p>
                </div>
            </div>




            <div class="row">
                <div class="col-12">
                    <div class="owl-slide-3 owl-carousel">

                        @foreach ($courses as $course)
                            <div class="course-1-item">
                                <figure class="thumnail">
                                    <a href="course-single.html"><img src="{{ asset('courses/' . $course->image) }}"
                                            alt="Image" class="img-fluid"></a>
                                    <div class="price">${{ $course->price }}</div>
                                    <div class="category">
                                        <h3>{{ $course->title }}</h3>
                                    </div>
                                </figure>
                                <div class="course-1-content pb-4">
                                    <h2>{{ $course->sub_title }}</h2>
                                    <div class="rating text-center mb-3">
                                        <span class="icon-star2 text-warning"></span>
                                        <span class="icon-star2 text-warning"></span>
                                        <span class="icon-star2 text-warning"></span>
                                        <span class="icon-star2 text-warning"></span>
                                        <span class="icon-star2 text-warning"></span>
                                    </div>
                                    <p class="desc mb-4">{{ $course->short_desc }}</p>
                                    <a href="{{ url('admissionPage/' . $course->id) }}#enrollment-form"
                                        class="btn btn-primary rounded-0 px-4">
                                        Enroll In This Course
                                    </a>
                                </div>
                            </div>
                        @endforeach






                    </div>

                </div>
            </div>



        </div>
    </div>




    <div class="section-bg style-1" style="background-image: url('images/about_1.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <h2 class="section-title-underline style-2">
                        <span>About Our University</span>
                    </h2>
                </div>
                <div class="col-lg-8">
                    <p class="lead">{{ Str::limit($pages->short_content, 150) }}</p>
                    <p><a href="{{ route('about') }}">Read more</a></p>
                </div>
            </div>
        </div>
    </div>



    <!-- // 05 - Block -->
    <div class="site-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-4">
                    <h2 class="section-title-underline">
                        <span>Testimonials</span>
                    </h2>
                </div>
            </div>


            <div class="owl-slide owl-carousel">
                @foreach ($testimonials as $testimonial)
                    <div class="ftco-testimonial-1">
                        <div class="ftco-testimonial-vcard d-flex align-items-center mb-4">
                            <img src="{{ asset('testimonials/' . $testimonial->image) }}" alt="Image"
                                class="img-fluid mr-3">
                            <div>
                                <h3>{{ $testimonial->client_name }}</h3>
                                <span>{{ $testimonial->designation }}</span>
                            </div>
                        </div>
                        <div>
                            <p>&ldquo;{!! $testimonial->message !!}&rdquo;</p>
                        </div>
                    </div>
                @endforeach



            </div>

        </div>
    </div>






    {{-- Blogs --}}
    <div class="news-updates">
        <div class="container">

            <div class="row">
                <div class="col-lg-9">
                    <div class="section-heading">
                        <h2 class="text-black">News &amp; Updates</h2>
                        <a href="#">Read All News</a>
                    </div>


                    <div class="row">
                        <div class="col-lg-6">
                            <div class="post-entry-big">
                                <a href="news-single.html" class="img-link"><img
                                        src="{{ asset('blogs/' . $mainBlog->images) }}" alt="Image"
                                        class="img-fluid"></a>
                                <div class="post-content">
                                    <div class="post-meta">
                                        <a href="#">{{ $mainBlog->created_at->format('F d,Y') }}</a>
                                        <span class="mx-1">/</span>
                                        <a href="#">{{ $mainBlog->title }}</a>
                                    </div>
                                    <h3 class="post-heading"><a href="news-single.html">{{ $mainBlog->short_content }}</a>
                                    </h3>
                                </div>
                            </div>
                        </div>



                        <div class="col-lg-6">

                            @foreach ($otherBlogs as $blog)
                                <div class="post-entry-big horizontal d-flex mb-4">
                                    <a href="news-single.html" class="img-link mr-4"><img
                                            src="{{ asset('blogs/' . $blog->images) }}" alt="Image"
                                            class="img-fluid"></a>
                                    <div class="post-content">
                                        <div class="post-meta">
                                            <a href="#">{{ $blog->created_at->format('F d, Y') }}</a>
                                            <span class="mx-1">/</span>
                                            <a href="#">{{ $blog->title }}</a>
                                        </div>
                                        <h3 class="post-heading"><a
                                                href="news-single.html">{{ $blog->short_content }}</a></h3>
                                    </div>
                                </div>
                            @endforeach





                        </div>
                    </div>
                </div>










                {{-- Video section --}}
                <div class="col-lg-3">
                    <div>
                        <h2 class="text-black">Campus Video</h2>
                        <a href="#">View All Videos</a>
                    </div>
                    @foreach ($videos as $video)
                        <a href="{{ $video->video_url }}" class="video-1 mb-4" data-fancybox="" data-ratio="2">
                            <span class="play">
                                <span class="icon-play"></span>
                            </span>
                            <img src="{{ asset('videos/' . $video->thumbnail) }}" alt="Image" class="img-fluid">
                        </a>
                    @endforeach

                </div>
            </div>
        </div>
    </div>




@endsection
