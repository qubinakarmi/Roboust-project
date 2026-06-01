@extends('frontend.front.layouts.app')
@section('content')
    <div class="page-banner">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12">
                    <h1>Contact</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li>Contact</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show " role="alert">
            {{ session('success') }}

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="contact-section">
        <div class="container">
            <div class="row address-rows">
                <div class="col-12 col-sm-12 col-md-6 col-lg-8 contact-left">
                    <h2>Get In Touch</h2>
                    <form action="{{ route('contacts.store') }}" method="POST">
                        @csrf

                        {{-- <input type="hidden" name="contact_for" value="{{ $contactSlug }}"> --}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="md-form">
                                    <input type="text" name="name" class="form-control" placeholder="Full name"
                                        value="{{ old('name') }}" required>
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="md-form">
                                    <input type="email" name="email" class="form-control" placeholder="Email"
                                        value="{{ old('email') }}" required>
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="md-form">
                                    <input type="text" name="phone" class="form-control" placeholder="Phone Number"
                                        value="{{ old('phone') }}">
                                    @error('phone')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="md-form">
                                    <input type="text" name="subject" class="form-control" placeholder="Subject"
                                        value="{{ old('subject') }}">
                                    @error('subject')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="md-form">
                                    <textarea name="description" class="form-control" placeholder="Your message" required>{{ old('message') }}</textarea>
                                    @error('description')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    <button type="submit" class="btn btn-primary mt-2">Send Your Message</button>
                                </div>
                            </div>
                        </div>


                    </form>
                </div>




                <div class="col-12 col-sm-12 col-md-6 col-lg-4">

                    <h2>
                        {{ $office->name }}

                        @if ($office->is_head_office)
                            (Head Office)
                        @endif
                    </h2>

                    <div class="contact-right">

                        <p>
                            <i class="fa fa-map-marker-alt"></i>
                            <span>Address</span>
                            {{ $office->address }}
                        </p>

                        <p>
                            <i class="fa fa-envelope"></i>
                            <span>Email Us</span>

                            <a href="mailto:{{ $office->email }}">
                                {{ $office->email }}
                            </a>
                        </p>

                        <p>
                            <i class="fa fa-phone-volume"></i>
                            <span>Call Us</span>

                            @if ($office->phone_1)
                                <a href="tel:{{ $office->phone_1 }}">
                                    {{ $office->phone_1 }}
                                </a>
                            @endif

                            @if ($office->phone_2)
                                /
                                <a href="tel:{{ $office->phone_2 }}">
                                    {{ $office->phone_2 }}
                                </a>
                            @endif

                            @if ($office->phone_3)
                                /
                                <a href="tel:{{ $office->phone_3 }}">
                                    {{ $office->phone_3 }}
                                </a>
                            @endif
                        </p>

                        @include('frontend.front.contact.socials')

                    </div>

                </div>










               <div class="row mt-4">

    {{-- LEFT COLUMN --}}
    <div class="col-12 col-sm-6 col-md-6 col-lg-3">

        @foreach($offices->take(2)->chunk(2) as $group)
            @foreach($group as $office)
                <div class="contact-box">
                    <img src="{{ asset('frontend/images/map-img.jpg') }}" alt="">

                    <h2>
                        {{ $office->name }}
                        @if($office->is_head_office)
                            (Head Office)
                        @endif
                    </h2>

                    <p>
                        <a href="{{ $office->map_link }}" target="_blank">
                            <i class="fa-solid fa-map-location-dot"></i>
                            {{ $office->address }}
                        </a>
                    </p>
                </div>
            @endforeach
        @endforeach

    </div>

    {{-- MIDDLE IMAGE --}}
    <div class="col-12 col-sm-12 col-md-12 col-lg-6 contact-mid">
        <img src="{{ asset('frontend/images/aus-map.png') }}" alt="">
    </div>

    {{-- RIGHT COLUMN --}}
    <div class="col-12 col-sm-6 col-md-6 col-lg-3">

        @foreach($offices->skip(2)->chunk(2) as $group)
            @foreach($group as $office)
                <div class="contact-box">
                    <img src="{{ asset('frontend/images/map-img.jpg') }}" alt="">

                    <h2>
                        {{ $office->name }}
                        @if($office->is_head_office)
                            (Head Office)
                        @endif
                    </h2>

                    <p>
                        <a href="{{ $office->map_link }}" target="_blank">
                            <i class="fa-solid fa-map-location-dot"></i>
                            {{ $office->address }}
                        </a>
                    </p>
                </div>
            @endforeach
        @endforeach

    </div>

</div>

            </div>
        </div>
    @endsection
