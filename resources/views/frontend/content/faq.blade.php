@extends('frontend.layouts.app')

@section('title', 'FAQ Page')

@section('content')

{{-- Header Section --}}
<div class="site-section ftco-subscribe-1 site-blocks-cover pb-4"   style="background-image: url({{ asset('frontend/images/bg_1.jpg') }})">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-7">
                <h2 class="mb-0 mt-3">FAQ</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
            </div>
        </div>
    </div>
</div>

{{-- FAQ Section --}}
<div class="site-section">
    <div class="container">

        <div class="row mb-5 justify-content-center text-center">
            <div class="col-lg-4">
                <h2 class="section-title-underline">
                    <span>FAQ</span>
                </h2>
            </div>
        </div>

        <div class="accordion" id="accordionExample">
            @foreach ($questions as $key => $collect)

                <div class="card">

                    {{-- Question --}}
                    <div class="card-header" id="heading{{ $key }}">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left {{ $key != 0 ? 'collapsed' : '' }}"
                                    type="button"
                                    data-toggle="collapse"
                                    data-target="#collapse{{ $key }}"
                                    aria-expanded="{{ $key == 0 ? 'true' : 'false' }}"
                                    aria-controls="collapse{{ $key }}">

                                {{ $collect->question }}?
                            </button>
                        </h2>
                    </div>

                    {{-- Answer --}}
                    <div id="collapse{{ $key }}"
                         class="collapse {{ $key == 0 ? 'show' : '' }}"
                         aria-labelledby="heading{{ $key }}"
                         data-parent="#accordionExample">

                        <div class="card-body">
                            {{ $collect->answer }}
                        </div>
                    </div>

                </div>

            @endforeach
        </div>

    </div>
</div>

@endsection