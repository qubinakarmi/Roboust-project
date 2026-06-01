<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>New Contact Message</title>
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

        .message-box {
            background-color: #f1f3f5;
            padding: 15px;
            border-radius: 8px;
            margin-top: 5px;
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
        <h2>📩 New Contact Message</h2>

        <div class="mb-3">
            <span class="field-label">Full Name:</span>
            <span class="field-value">{{ $contact->full_name }}</span>
        </div>

        <div class="mb-3">
            <span class="field-label">Email:</span>
            <span class="field-value">{{ $contact->email }}</span>
        </div>

        <div class="mb-3">
            <span class="field-label">Phone:</span>
            <span class="field-value">{{ $contact->phone ?? '-' }}</span>
        </div>

        <div class="mb-3">
            <span class="field-label">Subject:</span>
            <span class="field-value">{{ $contact->subject ?? '-' }}</span>
        </div>

        <div class="mb-3">
            <span class="field-label">Message:</span>
            <div class="message-box">
                {{ $contact->message }}
            </div>
        </div>

        <hr>
        <p class="text-muted small">This message was sent from your website contact form.</p>
    </div>
</body>

</html>
