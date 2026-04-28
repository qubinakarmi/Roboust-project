@extends('frontend.layouts.app')
@section('title', 'Admission Page')
@section('content')

{{ $id }}

    <div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url({{ asset('frontend/images/bg_1.jpg') }})">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-lg-7">
                    <h2 class="mb-0 mt-2">Admissions</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
                </div>
            </div>
        </div>
    </div>


    <div class="custom-breadcrumns border-bottom">
        <div class="container">
            <a href="{{ route('home') }}">Home</a>
            <span class="mx-3 icon-keyboard_arrow_right"></span>
            <span class="current">Admission</span>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-6 mb-lg-0 mb-4">
                    <img src="{{ asset('frontend/images/course_6.jpg') }}" alt="Image" class="img-fluid">
                </div>
                <div class="col-lg-5 ml-auto align-self-center">
                    <h2 class="section-title-underline mb-5">
                        <span>College Requirements</span>
                    </h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. At itaque dolore libero corrupti! Itaque,
                        delectus?</p>
                    <p>Modi sit dolor repellat esse! Sed necessitatibus itaque libero odit placeat nesciunt, voluptatum
                        totam facere.</p>

                    <ol class="ul-check primary list-unstyled">
                        <li>Accomplished Application Form</li>
                        <li>High School Report Card </li>
                        <li>High School Transcript</li>
                        <li>Certificate of Good Moral Characte</li>
                        <li>2×2 picture</li>
                        <li>1×1 picture</li>
                    </ol>

                </div>
            </div>

         
        </div>
    </div>
    <div class="d-flex align-item-center justify-content-center">


    <h1 > Admission Form </h1>
        </div>



    <form action="" method="POST" data-parsley-validate novalidate>
    @csrf

    <div class="site-section"  id="enrollment-form">
        <div class="container">

            <div class="row">
                <div class="col-md-6 form-group">
                    <label>Full Name</label>
                    <input type="text" name="name" class="form-control form-control-lg" required>
                </div>

                <div class="col-md-6 form-group">
                    <label>Email Address</label>
                    <input type="email" name="email" class="form-control form-control-lg" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 form-group">
                    <label>Phone Number</label>
                    <input type="number" name="phone" class="form-control form-control-lg" required>
                </div>

                <div class="col-md-6 form-group">
                    <label>Select Course</label>
                    <select name="course_id" class="form-control form-control-lg" required>
                        <option value="">-- Choose Course --</option>
                        @foreach($courses as $course)
                            <option value="{{ $course->id }}">{{ $course->title }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 form-group">
                    <label>Preferred Start Date</label>
                    <input type="date" name="start_date" class="form-control form-control-lg" required>
                </div>

                <div class="col-md-6 form-group">
                    <label>Address</label>
                    <input type="text" name="address" class="form-control form-control-lg" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 form-group">
                    <label>Message</label>
                    <textarea name="message" cols="30" rows="10" class="form-control" required></textarea>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <input type="submit" value="Enroll Now" class="btn btn-primary btn-lg px-5">
                </div>
            </div>

        </div>
    </div>
</form>





@endsection
