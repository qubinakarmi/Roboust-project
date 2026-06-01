@extends('frontend.front.layouts.app')
@section('content')
    <x-toast />
    <div class="page-banner">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12">
                    <h1>Apply Now</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li>Apply Now</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="apply-section">
        <div class="container">
            <div class="row apply-row">
                <div class="col-12 col-sm-12">
                    <h2>Let us know more about you!</h2>
                    <p>We review each inquiry carefully, and will reach out if there's a potential match for collaboration.
                    </p>
                </div>
                <div class="col-12 col-sm-12">
                    <form action="{{ route('enrollment.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-sm-12">
                                <h3>Personal Information</h3>
                            </div>

                            {{-- Full Name --}}
                            <div class="col-md-12 col-lg-12">
                                <div class="md-form">
                                    <label>Full name<span>*</span></label>
                                    <input type="text" name="name" class="form-control" placeholder="Full Name" required>
                                </div>
                            </div>

                            {{-- Email --}}
                            <div class="col-md-12 col-lg-6">
                                <div class="md-form">
                                    <label>Email<span>*</span></label>
                                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                                </div>
                            </div>

                            {{-- Address --}}
                            <div class="col-md-12 col-lg-6">
                                <div class="md-form">
                                    <label>Address<span>*</span></label>
                                    <input type="text" name="address" class="form-control" placeholder="Your Address" required>
                                </div>
                            </div>

                            {{-- State --}}
                            <div class="col-md-12 col-lg-6">
                                <div class="md-form">
                                    <label>Select your state<span>*</span></label>
                                    <select name="state" class="form-control" required>
                                        <option value="">Your State</option>
                                        <option value="New South Wales">New South Wales</option>
                                        <option value="Victoria">Victoria</option>
                                        <option value="Queensland">Queensland</option>
                                        <option value="South Australia">South Australia</option>
                                        <option value="Western Australia">Western Australia</option>
                                        <option value="Tasmania">Tasmania</option>
                                        <option value="Northern Territory">Northern Territory</option>
                                        <option value="Australian Capital Territory">Australian Capital Territory</option>
                                    </select>
                                </div>
                            </div>

                            {{-- Phone --}}
                            <div class="col-md-12 col-lg-6">
                                <div class="md-form">
                                    <label>Contact number<span>*</span></label>
                                    <input type="text" name="contact" class="form-control" placeholder="Contact number" required>
                                </div>
                            </div>

                            {{-- Photo ID Upload --}}
                            <div class="col-md-12 col-lg-6">
                                <div class="md-form">
                                    <label>Upload your photo ID<span>*</span></label>
                                    <input type="file" name="image" class="form-control" required>
                                </div>
                            </div>

                            {{-- How did you find us --}}
                            <div class="col-md-12 col-lg-6">
                                <div class="md-form">
                                    <label>How did you find us?<span>*</span></label>
                                    <select name="how_find_us" class="form-control" required>
                                        <option value="">Select your option</option>
                                        <option value="Google Search">Google Search</option>
                                        <option value="Social Media">Social Media</option>
                                        <option value="Friends">Friends</option>
                                        <option value="Advertisements">Advertisements</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                            </div>

                            {{-- Introduction --}}
                            <div class="col-md-12">
                                <div class="md-form">
                                    <label>Your Introduction</label>
                                    <textarea name="intro" class="form-control" placeholder="Your message"></textarea>
                                </div>
                            </div>

                            {{-- Submit Button --}}
                            <div class="col-12 col-sm-12 mt-3">
                                <button type="submit" class="btn btn-primary">Submit Now <i
                                        class="fa fa-paper-plane"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
