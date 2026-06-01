<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Coming Soon - Care Connect Tech</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .background-animation {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 0;
        }

        .circle {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            animation: float 20s infinite;
        }

        .circle:nth-child(1) {
            width: 150px;
            height: 150px;
            top: 10%;
            left: 10%;
            animation-delay: 0s;
        }

        .circle:nth-child(2) {
            width: 200px;
            height: 200px;
            top: 50%;
            left: 85%;
            animation-delay: 2s;
        }

        .circle:nth-child(3) {
            width: 180px;
            height: 180px;
            top: 70%;
            left: 15%;
            animation-delay: 4s;
        }

        .circle:nth-child(4) {
            width: 100px;
            height: 100px;
            top: 15%;
            left: 75%;
            animation-delay: 6s;
        }

        .circle:nth-child(5) {
            width: 130px;
            height: 130px;
            top: 40%;
            left: 50%;
            animation-delay: 3s;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0) rotate(0deg);
                opacity: 0.4;
            }

            50% {
                transform: translateY(-60px) rotate(180deg);
                opacity: 0.7;
            }
        }

        .container {
            position: relative;
            z-index: 1;
            text-align: center;
            background: rgba(255, 255, 255, 0.98);
            padding: 80px 60px;
            border-radius: 40px;
            box-shadow: 0 30px 80px rgba(0, 0, 0, 0.3);
            max-width: 900px;
            width: 90%;
            backdrop-filter: blur(20px);
            animation: slideUp 1.2s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(80px) scale(0.9);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .logo {
            margin-bottom: 40px;
        }

        .logo img {
            max-width: 180px;
            height: auto;
            animation: pulse 3s ease-in-out infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.08);
            }
        }

        .icon-wrapper {
            margin-bottom: 30px;
            position: relative;
        }

        .rocket-icon {
            font-size: 120px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: rocketFloat 4s ease-in-out infinite;
            display: inline-block;
            filter: drop-shadow(0 10px 20px rgba(102, 126, 234, 0.3));
        }

        @keyframes rocketFloat {

            0%,
            100% {
                transform: translateY(0) rotate(-5deg);
            }

            50% {
                transform: translateY(-30px) rotate(5deg);
            }
        }

        .sparkle {
            position: absolute;
            width: 8px;
            height: 8px;
            background: #ffd700;
            border-radius: 50%;
            animation: sparkle 2s ease-in-out infinite;
        }

        .sparkle:nth-child(1) {
            top: 20%;
            left: 30%;
            animation-delay: 0s;
        }

        .sparkle:nth-child(2) {
            top: 40%;
            right: 25%;
            animation-delay: 0.5s;
        }

        .sparkle:nth-child(3) {
            bottom: 30%;
            left: 35%;
            animation-delay: 1s;
        }

        @keyframes sparkle {

            0%,
            100% {
                opacity: 0;
                transform: scale(0);
            }

            50% {
                opacity: 1;
                transform: scale(1.5);
            }
        }

        h1 {
            font-size: 72px;
            font-weight: 800;
            color: #2d3748;
            margin-bottom: 25px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            line-height: 1.2;
            letter-spacing: -2px;
        }

        .subtitle {
            font-size: 24px;
            color: #4a5568;
            margin-bottom: 20px;
            font-weight: 400;
            line-height: 1.6;
        }

        .description {
            font-size: 18px;
            color: #718096;
            margin-bottom: 50px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
            font-weight: 300;
        }

        .social-links {
            display: flex;
            justify-content: center;
            gap: 25px;
            margin-top: 50px;
        }

        .social-icon {
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #f7fafc 0%, #edf2f7 100%);
            border-radius: 50%;
            color: #667eea;
            font-size: 24px;
            transition: all 0.4s ease;
            text-decoration: none;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .social-icon:hover {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            transform: translateY(-8px) scale(1.1);
            box-shadow: 0 15px 30px rgba(102, 126, 234, 0.4);
        }

        .decorative-line {
            width: 100px;
            height: 4px;
            background: linear-gradient(90deg, transparent, #667eea, transparent);
            margin: 40px auto;
            border-radius: 2px;
        }

        .status-badge {
            display: inline-block;
            background: linear-gradient(135deg, #48bb78 0%, #38a169 100%);
            color: white;
            padding: 12px 30px;
            border-radius: 50px;
            font-size: 14px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 30px;
            box-shadow: 0 8px 20px rgba(72, 187, 120, 0.3);
            animation: pulse 2s ease-in-out infinite;
        }

        @media (max-width: 768px) {
            .container {
                padding: 50px 30px;
            }

            h1 {
                font-size: 48px;
                letter-spacing: -1px;
            }

            .subtitle {
                font-size: 18px;
            }

            .description {
                font-size: 16px;
            }

            .rocket-icon {
                font-size: 80px;
            }

            .social-icon {
                width: 50px;
                height: 50px;
                font-size: 20px;
            }
        }

        @media (max-width: 480px) {
            h1 {
                font-size: 36px;
            }

            .subtitle {
                font-size: 16px;
            }

            .description {
                font-size: 14px;
            }

            .social-links {
                gap: 15px;
            }
        }
    </style>
</head>

<body>
    <div class="background-animation">
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
    </div>

    <div class="container">
        <div class="logo">
            <!-- Replace with your actual logo -->
            {{-- <img src="{{ asset('frontend/images/logo.png') }}" alt="Care Connect Tech"> --}}
        </div>

        {{-- <div class="status-badge">
            <i class="fas fa-tools"></i> Under Construction
        </div> --}}

        {{-- <div class="icon-wrapper">
            <div class="sparkle"></div>
            <div class="sparkle"></div>
            <div class="sparkle"></div>
            <i class="fas fa-rocket rocket-icon"></i>
        </div> --}}
        <div>
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('frontend/images/logo.png') }}" width="320" height="" alt="" />
            </a>
        </div>

        <h1>Coming Soon</h1>

        <div class="decorative-line"></div>

        <p class="subtitle">Something Amazing is on the Way!</p>

        <p class="description">
            We're crafting an exceptional experience just for you. Our team is working hard to bring you something truly
            special. Stay connected with us on social media for updates!
        </p>

    </div>
</body>

</html>
