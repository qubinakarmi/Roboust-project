@extends('frontend.layouts.app')

@section('title', 'Contact Page')

@section('content')

<div class="site-section ftco-subscribe-1 site-blocks-cover pb-4"
    style="background-image: url({{ asset('frontend/images/bg_1.jpg') }})">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-7">
                <h2 class="mb-0 mt-2">Contact</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
            </div>
        </div>
    </div>
</div>

<div class="custom-breadcrumns border-bottom">
    <div class="container">
        <a href="{{ route('home') }}">Home</a>
        <span class="mx-3 icon-keyboard_arrow_right"></span>
        <span class="current">Contact</span>
    </div>
</div>

{{-- Success Message --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}

            {{-- <button type="button" class="btn-close" data-bs-dismiss="alert"></button> --}}
        </div>
    @endif

{{-- Validation Errors --}}
@if ($errors->any())
    @foreach ($errors->all() as $error)
        <p style="color:red;">{{ $error }}</p>
    @endforeach
@endif

<form action="{{ route('contacts.store') }}" method="POST" data-parsley-validate novalidate>
    @csrf

    <div class="site-section">
        <div class="container">

            <div class="row">
                <div class="col-md-6 form-group">
                    <label>First Name</label>
                    <input type="text" name="name" class="form-control form-control-lg" required>
                </div>

                <div class="col-md-6 form-group">
                    <label>Email Address</label>
                    <input type="email" name="email" class="form-control form-control-lg" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 form-group">
                    <label>Tel. Number</label>
                    <input type="number" name="phone" class="form-control form-control-lg" required>
                </div>

                <div class="col-md-6 form-group">
                    <label>Subject</label>
                    <input type="text" name="subject" class="form-control form-control-lg" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 form-group">
                    <label>Message</label>
                    <textarea name="description" cols="30" rows="10" class="form-control" required></textarea>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <input type="submit" value="Send Message" class="btn btn-primary btn-lg px-5">
                </div>
            </div>

        </div>
    </div>
</form>





@endsection