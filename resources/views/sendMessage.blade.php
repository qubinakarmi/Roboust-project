@extends('admin.layouts.app2')

@section('title', 'Reply')

@section('content')

    <div class="container mt-4">
        <div class="card">
     

            <div class="card-body">

                <form action="{{ route('sendMail') }}" method="POST">
                    @csrf

                    <!-- Email -->
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" class="form-control" >
                    </div>

                    <div class="mb-3">
                        <label>Subject</label>
                        <textarea name="subject" class="form-control"  placeholder="Write your message..." ></textarea>
                    </div>

                    <!-- Message -->
                    <div class="mb-3">
                        <label>Message</label>
                        <textarea  name="message" class="form-control" rows="5" placeholder="Write your message..." required></textarea>
                    </div>

                    <!-- Buttons -->
                    <button type="submit" class="btn btn-success">Send</button>
                    <a href="{{ route('contacts.index') }}" class="btn btn-secondary">Back</a>

                </form>

            </div>
        </div>
    </div>

@endsection
