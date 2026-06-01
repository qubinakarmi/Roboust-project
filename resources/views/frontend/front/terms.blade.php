@extends('front.layouts.app')
@section('content')
<style>
.termslist{  }
.termslist li{  }
.termslist li ul{  }
.termslist li ul li{ list-style: circle; margin-left: 20px; }
</style> 
    <div class="page-banner">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12">
                    <h1>Terms & Conditions</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li>Terms & Conditions</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="welcome-section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <h2>Terms and Conditions – Care Connect Tech</h2>
                    <p>
                        By using this website or enrolling in any program with <strong>Care Connect Tech</strong>, you agree to the following terms and conditions
                    </p>
                    <ol class="termslist">
                        <li><strong>General Use</strong>
                            <ul>
                                <li>All information and materials on this website are provided for educational and informational purposes.</li>
                                <li>We may update, modify, or remove website content, course details, or schedules at any time without prior notice.</li>
                            </ul>
                        </li>
                        <li><strong>Course Enrolment</strong>
                            <ul>
                                <li>Enrolment in any program is subject to eligibility, seat availability, and confirmation from our admissions team.</li>
                                <li>Course content, trainers, and delivery mode (online/on-campus) may change when necessary to maintain quality training.</li>
                            </ul>
                        </li>
                        <li><strong>Payments and Fees</strong>
                            <ul>
                                <li>All course fees must be paid as per the agreed terms at the time of enrolment.</li>
                                <li>Any promotional discounts or offers apply only during the specified period.</li>
                                <li>Refunds or cancellations will follow our institution’s official payment policy.</li>
                            </ul>
                        </li>
                        <li><strong>Student Responsibilities</strong>
                            <ul>
                                <li>Students must provide accurate information during registration and maintain updated contact details.</li>
                                <li>Access credentials for online platforms must be kept confidential and not shared with others.</li>
                                <li>Students are expected to behave respectfully toward trainers, staff, and other learners.</li>
                            </ul>
                        </li>
                        <li><strong>Intellectual Property</strong>
                            <ul>
                                <li>All course materials, videos, and resources are the intellectual property of Care Connect Tech Institution.</li>
                                <li>Content may not be copied, distributed, or reproduced without written permission.</li>
                            </ul>
                        </li>
                        <li><strong>Website Use</strong>
                            <ul>
                                <li>You must not use this website for unlawful, fraudulent, or harmful purposes.</li>
                                <li>We may restrict or terminate access for users who misuse the site or violate these terms.</li>
                            </ul>
                        </li>
                        <li><strong>Privacy</strong>
                            <ul>
                                <li>Any personal information collected is handled in accordance with our <a href="{{ route('front-policy') }}" target="_blank">Privacy Policy</a>.</li>
                                <li>By submitting your details, you consent to the collection and use of your information as described.</li>
                            </ul>
                        </li>
                        <li><strong>Limitation of Liability</strong>
                            <ul>
                                <li>Care Connect Tech Institution will not be liable for any indirect, incidental, or consequential loss arising from the use of our website or services.</li>
                            </ul>
                        </li>
                        <li><strong>Updates to Terms</strong>
                            <ul>
                                <li>We may revise these Terms and Conditions at any time. Continued use of our website or services means you accept the latest version.</li>
                            </ul>
                        </li>
                    </ol>
                </div>
            </div>
            
        </div>
    </div>
@endsection
