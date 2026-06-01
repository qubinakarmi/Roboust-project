<div class="certificate-section">
    <div class="container">

        <div class="row">

            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                <button class="btn btn-certificate"><i class="fa-regular fa-circle-check"></i> Get Your
                    Certificate</button>
                @foreach ($certificates as $certificate)
                    <h4>{{ $certificate->title }}</h4>
                    <a href="" class="btn btn-start">Get Start Today <i class="fa-regular fa-paper-plane"></i></a>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                <img class="circle-img" src="{{ asset('frontend/images/circle-img.png') }}" alt="">
                <img class="girl_img"
                    src="{{ isset($certificate->image) ? asset('certificates/' . $certificate->image) : 'N\A' }}"
                    alt="">
            </div>
            @endforeach



        </div>
    </div>
</div>

<footer>
    <div class="top-footer">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-6 col-lg-3 footer-social">
                    <h4>Contact Info</h4>
                    <p><i class="fa fa-map-marker"></i> Address<span><a href="https://maps.app.goo.gl/Ucyjn2R4UHaf5GnJ9"
                                target="_blank" style="font-size: small">{{ $settings['location'] }}</a></span></p>
                    <p><i class="fa fa-phone-volume"></i> Phone<span><a href="tel:+61290934716">
                                {{ $settings['contact'] }} </a> </span>
                    </p>
                    <p><i class="fa fa-envelope"></i> Email<a href="mailto:info@careconnecttech.com.au">
                            {{ $settings['email'] }} </a> </p>
                    <h5>Our Social Community</h5>
                    <ul>
                        <li><a href="http://www.linkedin.com/in/careconnecttech/" target="_blank"><i
                                    class="fab fa-linkedin"></i> </a> </li>
                        <li><a href="https://www.facebook.com/profile.php?id=61583521261937" target="_blank"><i
                                    class="fab fa-facebook-f"></i> </a> </li>
                        <li><a href="https://www.instagram.com/care.connecttech/" target="_blank"><i
                                    class="fa-brands fa-square-instagram"></i> </a> </li>
                        <li><a href="https://www.tiktok.com/@careconnecttech" target="_blank"><i
                                    class="fab fa-tiktok"></i> </a> </li>
                    </ul>
                    <h5>ABN Number: 20 674 572 322</h5>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-3 quicks">
                    <h4>Quick Links</h4>
                    <ul>
                        @foreach ($offices as $office)
                            <li><a href="{{ route('contact.office',$office->slug) }}">{{ $office->name }}</a></li>
                        @endforeach


                    </ul>
                </div>
                <div class="col-12 col-sm-6 col-lg-3 quicks">
                    <h4>Training</h4>
                    <ul>
                        @foreach ($courses as $course)
                            <li>
                                <a href="{{ route('courses.course_detail', $course->slug) }}">{{ $course->title }}</a>
                            </li>
                        @endforeach

                    </ul>
                </div>
                <div class="col-12 col-sm-6 col-lg-3 quicks">
                    <h4>Tech Solutions</h4>
                    <ul>
                        <li><a href="{{ route('coming-soon') }}"> Domain & Hosting</a></li>
                        <li><a href="{{ route('coming-soon') }}"> Digital Marketing</a></li>
                        <li><a href="{{ route('coming-soon') }}"> Search Engine Optimization</a></li>
                        <li><a href="{{ route('coming-soon') }}"> Social Media Marketing</a></li>
                        <li><a href="{{ route('coming-soon') }}"> Cloud Computing Services</a></li>
                        <li><a href="{{ route('coming-soon') }}"> Web Design & Development</a></li>
                        <li><a href="{{ route('coming-soon') }}"> Mobile App Development</a></li>
                        <li><a href="{{ route('coming-soon') }}"> Custom Software Development</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom-footer">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                    <p>Care Connect Tech © 2025. All Rights Reserved. &nbsp;&nbsp;&nbsp; <span style="color: #a19e9e">
                            Maintain by: <a style="color: #a19e9e" href="https://robustintech.com/"
                                target="_blank">RobustInfoTech</a> </span></p>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                    <ul>
                        <li><a href="{{ route('front-disclaimer') }}">Disclaimer</a> </li>
                        <li><a href="{{ route('front-policy') }}">Privacy Policy</a> </li>
                        <li><a href="{{ route('front-terms') }}">Terms & Conditions</a> </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>


<div class="scroll-top-wrapper show">
    <span class="scroll-top-inner">
        <i class="fa fa-angle-up"></i>
        <h5>TOP</h5>
    </span>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/wow.min.js"></script>
<script>
    new WOW().init();
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<script src="./js/main.js"></script>


<script>
    //MOBILE MENU

    function openNav() {
        document.getElementById("mySidenav").style.width = "300px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }
</script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.js"></script>
<script>
    new WOW().init();
</script>
<script>
    $('.portfolio-item').isotope({
        itemSelector: '.item',
        layoutMode: 'fitRows'
    });
    $('.portfolio-menu ul li').click(function() {
        $('.portfolio-menu ul li').removeClass('active');
        $(this).addClass('active');

        var selector = $(this).attr('data-filter');
        $('.portfolio-item').isotope({
            filter: selector
        });
        return false;
    });
    $(document).ready(function() {
        var popup_btn = $('.popup-btn');
        popup_btn.magnificPopup({
            type: 'image',
            gallery: {
                enabled: true
            }
        });
    });
</script>
</body>

</html>
