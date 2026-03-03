@extends('admin.layouts.app2')
@section('title','counter')
@section('content')
     <div class="container vh-80 d-flex justify-content-center align-items-center">
        <div class="card shadow-lg text-center p-5">


            <h1 id="counter" class="display-3 fw-bold text-primary">0</h1>
            <p class="text-muted">Bootstrap Animated Counter</p>
        </div>
    </div>

    <script>
        // ===== CUSTOM SETTINGS =====
        let startNumber = 0;       // Starting number
        let endNumber = 200;       // Ending number
        let speed = 20;            // Speed (lower = faster)
        let prefix = "Rs ";        // Prefix
        let suffix = " +";         // Suffix
        // ===========================

        let counter = document.getElementById("counter");
        let current = startNumber;

        let interval = setInterval(function () {
            current++;
            counter.innerText = prefix + current + suffix;

            if (current >= endNumber) {
                clearInterval(interval);
            }
        }, speed);
    </script>


@endsection