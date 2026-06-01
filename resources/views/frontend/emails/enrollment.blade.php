<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>New Student Enrollment</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            padding: 20px;
        }

        .email-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            max-width: 700px;
            margin: auto;
        }

        h2 {
            color: #0d6efd;
            margin-bottom: 25px;
        }

        .field-label {
            font-weight: 600;
            color: #495057;
        }

        .field-value {
            color: #212529;
        }

        .intro-box {
            background-color: #f1f3f5;
            padding: 15px;
            border-radius: 8px;
            margin-top: 5px;
        }

        a.view-link {
            color: #0d6efd;
            text-decoration: none;
        }

        a.view-link:hover {
            text-decoration: underline;
        }

        @media (max-width: 576px) {
            .email-container {
                padding: 20px;
            }
        }
    </style>
</head>

<body>
    <div class="email-container">
        <h2>🎓 New Student Enrollment</h2>

        <div class="mb-3">
            <span class="field-label">Full Name:</span>
            <span class="field-value">{{ $enrollment->full_name }}</span>
        </div>

        <div class="mb-3">
            <span class="field-label">Email:</span>
            <span class="field-value">{{ $enrollment->email }}</span>
        </div>

        <div class="mb-3">
            <span class="field-label">Address:</span>
            <span class="field-value">{{ $enrollment->address }}</span>
        </div>

        <div class="mb-3">
            <span class="field-label">State:</span>
            <span class="field-value">{{ $enrollment->state }}</span>
        </div>

        <div class="mb-3">
            <span class="field-label">Phone:</span>
            <span class="field-value">{{ $enrollment->phone }}</span>
        </div>

        <div class="mb-3">
            <span class="field-label">How did you find us:</span>
            <span class="field-value">{{ $enrollment->how_find_us }}</span>
        </div>

        <div class="mb-3">
            <span class="field-label">Intro:</span>
            <div class="intro-box">
                {{ $enrollment->intro }}
            </div>
        </div>

        @if ($enrollment->photo_id)
            <div class="mb-3">
                <span class="field-label">Photo ID:</span>
                <a class="view-link" href="{{ asset('storage/' . $enrollment->photo_id) }}" target="_blank">View Upload</a>
            </div>
        @endif

        <hr>
        <p class="text-muted small">This enrollment message was submitted via your website.</p>
    </div>
</body>

</html>
