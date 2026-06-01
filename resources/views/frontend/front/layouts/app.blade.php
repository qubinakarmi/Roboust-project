<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="{{ asset('frontend/images/favicon.png') }}" />

    <title>@yield('title', 'Care Connect Tech')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">

    <!-- Animate CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Owl Carousel -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

    <!-- Magnific Popup -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css">
    
    <style>
    .head_social, .sidenav a .head_social{
        color: #ffffff !important;
        font-size: 14px;
        padding: 10px;
        text-decoration: none;
        float: left !important;
    }
    </style>

    @stack('styles')
</head>

<body>

    {{-- Header --}}
    @include('frontend.front.partials.header')

    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('frontend.front.partials.footer')

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JS -->
    <script src="{{ asset('frontend/js/main.js') }}"></script>
    
    <script type="text/javascript">
    //   
    </script>
    
    <script>
       $(window).on('load', function() {
        function setCookie(name, value, days) {
          const expires = new Date(Date.now() + days * 864e5).toUTCString();
          document.cookie = name + '=' + encodeURIComponent(value) + '; expires=' + expires + '; path=/';
        }
        function getCookie(name) {
          return document.cookie.split('; ').reduce((r, v) => {
            const parts = v.split('=');
            return parts[0] === name ? decodeURIComponent(parts[1]) : r;
          }, '');
        }
    
        const cookieName = 'dailyModalShown';
        const today = new Date().toISOString().slice(0, 10);
    
        if (getCookie(cookieName) !== today) {
          const modalEl = document.getElementById('disclaimerModel');
          const modal = new bootstrap.Modal(modalEl);
          modal.show();
          // expires in 1 day; value is today's date so you can check exact day
          setCookie(cookieName, today, 1);
        }
      });
    </script>

    @stack('scripts')

</body>

</html>
