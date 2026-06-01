@extends('frontend.front.layouts.app')
@section('content')
    <div class="page-banner">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12">
                    <h1>Team Members</h1>
                    <ul class="breadcrumb">
                        <li><a href="index.html">Home</a></li>
                        <li>Team Members</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="team-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Team Detail Were Coming Soon</h2>
                </div>

            </div>
        </div>
    </div> --}}



    <section class="py-5 bg-light">
        <div class="container">

            <!-- Section Title -->
            <div class="text-center mb-5">
                <h2 class="fw-bold">Our Team</h2>
                <p class="text-muted">Meet the people behind our success</p>
            </div>

            <div class="row g-4">

                <!-- Team Member 1 -->
                @foreach ($teams as $team)
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="card border-0 shadow-sm text-center h-100">
                            <img src="{{ asset('teams/' . $team->image) }}" class="card-img-top" alt="Team Member">

                            <div class="card-body">
                                <h5 class="fw-bold mb-1">{{ $team->full_name }}</h5>
                                <p class="text-muted mb-2">{{ $team->designation }}</p>

                                <p class="small text-muted">
                                    {{ $team->short_bio }} </p>
                            </div>
                        </div>
                    </div>
                @endforeach





            </div>
        </div>
    </section>
@endsection
