@extends('frontend.front.layouts.app')
@section('content')
    <div class="page-banner">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12">
                    <h1>About Us</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li>About Us</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="welcome-section">
        <div class="container">



            <div class="row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                    <h2>{{ $about->title }}</h2>
                    <h3>{{ $about->sub_title }}</h3>
                    {!! $about->detail_content !!}

                    <h3>Our Mission</h3>
                    <p>To empower learners with practical skills and global certifications that open doors to lasting
                        career
                        success.</p>
                    <p><strong>Our Location</strong> 📍 166 Forest Road, Hurstville, NSW 2220</p>
                    <p>Conveniently located in central Hurstville with easy access to public transport and local
                        amenities.
                    </p>

                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                    <img src="{{ asset('abouts/' . $about->image) }}" alt="">
                </div>
            </div>



            <div class="row">
                <div class="col-12">
                    <h2 class="text-center">Our Brand</h2>

                    <div class="row">
                        @forelse($brands as $brand)
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="care-box">
                                    <h4>{{ $brand->title ?? 'N/A' }}</h4>
                                    {!! $brand->description ?? 'N/A' !!}
                                </div>
                            </div>
                        @empty
                            <p>No brands found.</p>
                        @endforelse

                    </div>

                </div>
            </div>






        </div>
    </div>

    <div class="whyus-section">



        <div class="container">

            <div class="row">
                @if (!empty($item))
                    <div class="col-12 col-sm-12">
                        <h3>{{ $item->title }}</h3>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                        {!! $item->description !!}
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                        <img src="{{ asset('why/' . $item->image) }}" alt="{{ $item->title }}">
                    </div>
                @else
                    <p>No data found</p>
                @endif
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
@endsection
