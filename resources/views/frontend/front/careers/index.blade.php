@extends('frontend.front.layouts.app')
@section('content')
    <div class="page-banner">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12">
                    <h1>Career</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li>Career</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="career-section">
        <div class="container">

            @foreach ($careers as $career)
                <div class="row">
                    <div class="col-12 col-sm-12">
                        <div class="career-box">
                            <h2>{{ $career->title }}</h2>
                            {!! $career->description !!}

                            @php
                                $headOffice = \App\Models\Office::where('is_head_office', 1)
                                    ->where('status', 1)
                                    ->first();
                            @endphp


                            <a href="{{ route('contact.office', $headOffice->slug) }}" class="btn btn-apply">Contact Us
                                <i class="fa fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach













        </div>
    </div>
@endsection
