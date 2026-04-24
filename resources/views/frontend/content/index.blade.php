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
                                        <p><a href="course-single.html" class="btn btn-primary rounded-0 px-4">Enroll In
                                                This
                                                Course</a></p>
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
                    <p class="lead">{{ Str::limit($pages->short_content,150) }}</p>
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


    <div class="section-bg style-1" style="background-image: url('images/hero_1.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-5 mb-lg-0">
                    <span class="icon flaticon-mortarboard"></span>
                    <h3>Our Philosphy</h3>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reiciendis recusandae, iure repellat quis
                        delectus ea? Dolore, amet reprehenderit.</p>
                </div>
                <div class="col-lg-4 col-md-6 mb-5 mb-lg-0">
                    <span class="icon flaticon-school-material"></span>
                    <h3>Academics Principle</h3>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reiciendis recusandae, iure repellat quis
                        delectus ea?
                        Dolore, amet reprehenderit.</p>
                </div>
                <div class="col-lg-4 col-md-6 mb-5 mb-lg-0">
                    <span class="icon flaticon-library"></span>
                    <h3>Key of Success</h3>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reiciendis recusandae, iure repellat quis
                        delectus ea?
                        Dolore, amet reprehenderit.</p>
                </div>
            </div>
        </div>
    </div>

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
                                <a href="news-single.html" class="img-link"><img src="images/blog_large_1.jpg"
                                        alt="Image" class="img-fluid"></a>
                                <div class="post-content">
                                    <div class="post-meta">
                                        <a href="#">June 6, 2019</a>
                                        <span class="mx-1">/</span>
                                        <a href="#">Admission</a>, <a href="#">Updates</a>
                                    </div>
                                    <h3 class="post-heading"><a href="news-single.html">Campus Camping and Learning
                                            Session</a></h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="post-entry-big horizontal d-flex mb-4">
                                <a href="news-single.html" class="img-link mr-4"><img src="images/blog_1.jpg"
                                        alt="Image" class="img-fluid"></a>
                                <div class="post-content">
                                    <div class="post-meta">
                                        <a href="#">June 6, 2019</a>
                                        <span class="mx-1">/</span>
                                        <a href="#">Admission</a>, <a href="#">Updates</a>
                                    </div>
                                    <h3 class="post-heading"><a href="news-single.html">Campus Camping and Learning
                                            Session</a></h3>
                                </div>
                            </div>

                            <div class="post-entry-big horizontal d-flex mb-4">
                                <a href="news-single.html" class="img-link mr-4"><img src="images/blog_2.jpg"
                                        alt="Image" class="img-fluid"></a>
                                <div class="post-content">
                                    <div class="post-meta">
                                        <a href="#">June 6, 2019</a>
                                        <span class="mx-1">/</span>
                                        <a href="#">Admission</a>, <a href="#">Updates</a>
                                    </div>
                                    <h3 class="post-heading"><a href="news-single.html">Campus Camping and Learning
                                            Session</a></h3>
                                </div>
                            </div>

                            <div class="post-entry-big horizontal d-flex mb-4">
                                <a href="news-single.html" class="img-link mr-4"><img src="images/blog_1.jpg"
                                        alt="Image" class="img-fluid"></a>
                                <div class="post-content">
                                    <div class="post-meta">
                                        <a href="#">June 6, 2019</a>
                                        <span class="mx-1">/</span>
                                        <a href="#">Admission</a>, <a href="#">Updates</a>
                                    </div>
                                    <h3 class="post-heading"><a href="news-single.html">Campus Camping and Learning
                                            Session</a></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="section-heading">
                        <h2 class="text-black">Campus Videos</h2>
                        <a href="#">View All Videos</a>
                    </div>
                    <a href="https://vimeo.com/45830194" class="video-1 mb-4" data-fancybox="" data-ratio="2">
                        <span class="play">
                            <span class="icon-play"></span>
                        </span>
                        <img src="images/course_5.jpg" alt="Image" class="img-fluid">
                    </a>
                    <a href="https://vimeo.com/45830194" class="video-1 mb-4" data-fancybox="" data-ratio="2">
                        <span class="play">
                            <span class="icon-play"></span>
                        </span>
                        <img src="images/course_5.jpg" alt="Image" class="img-fluid">
                    </a>
                </div>
            </div>
        </div>
    </div>



    {{-- 
    <div class="site-section ftco-subscribe-1" style="background-image: url('images/bg_1.jpg')">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <h2>Subscribe to us!</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,</p>
                </div>
                <div class="col-lg-5">
                    <form action="" class="d-flex">
                        <input type="text" class="rounded form-control mr-2 py-3" placeholder="Enter your email">
                        <button class="btn btn-primary rounded py-3 px-4" type="submit">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
