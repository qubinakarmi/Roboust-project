@extends('frontend.front.layouts.app')
@section('content')
    <div class="page-banner">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12">
                    <h1>FAQs</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li>FAQs</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="faqs-section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-2 col-lg-2">

                </div>
                <div class="col-12 col-sm-12 col-md-8 col-lg-8">
                    <h2>Frequently Asked Qestions</h2>
                    <ul class="accordion-list">

                        @foreach ($details as $detail)
                            <li>
                                <h3>{{ $detail->question }}</h3>
                                <div class="answer">
                                    <p>
                                   {{ $detail->answer }}
                                    </p>
                                </div>
                            </li>
                        @endforeach




                </div>
                </li>
                </ul>
            </div>
            <div class="col-12 col-sm-12 col-md-2 col-lg-2">

            </div>
        </div>
    </div>
    </div>
@endsection
