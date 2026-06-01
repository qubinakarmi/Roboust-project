@extends('frontend.front.layouts.app')
{{-- {{ dd($services) }} --}}
@section('content')
    <!-- Modal -->
    <div class="modal fade" id="disclaimerModel" tabindex="-1" aria-labelledby="disclaimerModelLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title fs-5" id="disclaimerModelLabel">Disclaimer</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <h3>Disclamer for Care Connect Tech</h3>
                            <h5>New Trading Name and Logo Announcement</h5>
                            <br>
                            <p>Please note that &#39;Extratech Perth Pty Ltd (ABN 29 681 774 952) Pty Ltd, Company' is now
                                trading as '<strong>Care Connect Tech</strong>'.</p>
                            <p>While our trading name and logo are new, everything else remains the same. We are same
                                dedicated team, management, Director of WA, ACT and previous Director and Founder of
                                Adelaide Branch with high-quality service. Our social media channels, contact details and
                                physical location are all unchanged.</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 hero-left">
                    <ul>
                        <li><img src="{{ asset('frontend/images/img1.jpg') }}" alt=""> </li>
                        <li><img src="{{ asset('frontend/images/img2.jpg') }}" alt=""> </li>
                        <li><img src="{{ asset('frontend/images/img3.jpg') }}" alt=""> </li>
                        <li><img src="{{ asset('frontend/images/img4.jpg') }}" alt=""> </li>
                        <li><img src="{{ asset('frontend/images/img5.jpg') }}" alt=""> </li>
                    </ul>
                    <div class="rating-box">
                        <h5>4.9 <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                class="fa fa-star"></i> <i class="fa fa-star"></i> <span>Engaged Students</span> </h5>
                    </div>
                    @foreach ($sliders as $slider)
                        <h1>{{ $slider->title }}</h1>
                        <form method="GET" action="{{ route('courses.course-list') }}">
                            <div class="search-container">
                                <i class="fa fa-search"></i>
                                <input type="search" placeholder="Search for courses...">
                                <button type="submit"><i class="fa-regular fa-paper-plane"></i> </button>
                            </div>
                        </form>
                        <div class="hero-btns">
                            <a href="" class="btn btn-today">Contact Us Today</a>
                            <!-- <a href="#" class="btn btn-play" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-play"></i> </a> -->
                            <a href="{{ $slider->video_link }}" class="btn btn-play"><i class="fa fa-play"></i> </a>
                            <h6>{{ $slider->sub_title }}</h6>
                        </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 hero-right">
                    <div class="white-box-1 animate__animated animate__shakeY animation-count: infinite;">
                        <i class="fa-solid fa-graduation-cap"></i>
                        <h6>Join for Free</h6>
                        <p>2.5k+ Courses Available</p>
                    </div>
                    <div class="d-flex justify-content-center justify-content-md-end">
                        <img src="{{ asset('sliders/' . $slider->image) }}" alt="" class="hero-img">
                    </div>
                    @endforeach

                    <div class="white-box-2 animate__animated animate__shakeY animation-count: infinite;">
                        <h6><i class="fa fa-star"></i> Success Rate 4.9%</h6>
                        <img src="{{ asset('frontend/images/progress.PNG') }}" alt="">
                    </div>
                </div>
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
                                @php
                                    $headOffice = \App\Models\Office::where('is_head_office', 1)
                                        ->where('status', 1)
                                        ->first();
                                @endphp

                                <a href="{{ route('contact.office', $headOffice->slug) }}" class="btn btn-enroll">
                                    Contact Us <i class="fa fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>


                    </div>
                @endforeach






            </div>
        </div>

    </div>

    </div>

    <div class="choose-section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-5 col-lg-5">
                    <img src=" {{ isset($item->image) ? asset('why/' . $item->image) : 'N/A' }} "
                        alt="{{ $item->title }}">
                </div>
                <div class="col-12 col-sm-12 col-md-1 col-lg-1">

                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                    <h2>{{ $item->title ?? 'N/A' }}</h2>
                    {!! $item->description !!}

                    {{-- <ul>
                        <li><i class="fa-solid fa-check-double"></i> Wide Range of Courses</li>
                        <li><i class="fa-solid fa-check-double"></i> Cost-Effective</li>
                        <li><i class="fa-solid fa-check-double"></i> Global Networking</li>
                        <li><i class="fa-solid fa-check-double"></i> Get Certificate</li>
                    </ul> --}}
                    <a href="{{ route('about-us') }}" class="btn btn-read">Read More</a>
                </div>
            </div>


            <div class="row choose-rows">
                @foreach ($services as $service)
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                        <div class="choose-box">
                            <img src="{{ asset('services/' . $service->image) }}" alt="">
                            <h5>{{ $service->title }}</h5>
                            <p>{{ $service->short_desc }}</p>
                        </div>
                    </div>
                @endforeach



            </div>
        </div>
    </div>
    <div class="student-section">
        <div class="container">
            <div class="row">

                <div class="col-12">
                    <h4>Success Students</h4>
                </div>

                <div class="col-12 col-lg-6 student-left">
                    <img src="{{ asset('frontend/images/student-img.png') }}" alt="">
                </div>

                <div class="col-12 col-lg-6 student-right-img">
                    <div class="owl-three owl-carousel owl-theme">

                        @php
                            $galleryChunks = $galleries->chunk(16);
                        @endphp

                        @foreach ($galleryChunks as $chunk)
                            <div class="item">
                                <div class="row">

                                    @foreach ($chunk as $gallery)
                                        <div class="col-6 col-sm-6 col-md-4 col-lg-3">
                                            <img src="{{ asset('gallery/' . $gallery->image) }}" alt="">
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- // Review Section // -->

    <div class="partner-section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12">
                    @foreach ($placements as $placement)
                        <h4>{{ $placement->title ?? 'N\A' }}</h4>
                        <p>{{ $placement->short_desc ?? 'N\A' }}</p>
                    @endforeach
                </div>


                <div class="col-12 col-sm-12 owl-two owl-carousel owl-theme">
                    @foreach ($aluminies as $alumini)
                        <div class="partner-box">
                            <a href="#"><img src="{{ asset('alumini/' . $alumini->image) }}"
                                    alt="{{ $alumini->title }}"></a>
                        </div>
                    @endforeach


                </div>
            </div>
        </div>
    </div>
    <div class="blog-section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12">
                    <h4>Care Connect Insights</h4>
                </div>
                @foreach ($blogs as $blog)
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                        <a href="{{ route('blogs.blog', $blog->slug) }}"><img
                                src="{{ asset('blogs/' . $blog->images) }}" alt=""> </a>
                        <div class="blog-content">
                            <ul>
                                <li><a href="#"><i class="fa fa-user"></i> {{ $blog->author->name }}</a> </li>
                                <li><a href="#"><i class="fa fa-calendar"></i>
                                        {{ $blog->created_at->format('m-d-Y') }} </a> </li>
                            </ul>
                            <h5><a href="{{ route('blogs.blog', $blog->slug) }}">The Power of Cloud Computing: Why the
                                    Future
                                    {{ $blog->title }}</a> </h5>
                            <p>{{ Str::limit($blog->short_content, 80) }}
                            </p>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </div>

    <style>
        .hero-img {
            width: 100%;
            max-width: 450px;
            aspect-ratio: 1/1;
            border-radius: 50%;
            object-fit: cover;
        }
    </style>
@endsection
