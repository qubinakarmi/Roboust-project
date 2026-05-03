@extends('admin.layouts.app2')
@section('title', 'Add Faq')

@section('content')

    <main class="app-main">
        <div class="app-content">
            <div class="container-fluid">

                <div class="card card-info card-outline">

                    <!-- Header -->
                    <div class="card-header">
                        <h3 class="card-title">Add New Faq</h3>
                    </div>

                    <!-- Form -->
                    <form action="{{ route('faq.store') }}" method="POST" enctype="multipart/form-data" data-parsley-validate
                        novalidate>
                        @csrf

                        <div class="card-body">
                            <div class="row g-3">

                                <!-- Service Name -->
                                <div class="col-md-12">
                                    <label class="form-label">Question</label>
                                    <input type="text" name="question" class="form-control" placeholder="Enter  question"
                                        required>

                                    @error('question')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror


                                </div>





                                <div class="col-md-12">
                                    <label class="form-label">Answer</label>
                                    <input type="text" name="answer" class="form-control" placeholder="Enter answer"
                                       required>

                                    @error('answer')
                                        <span style="color: red;">{{ $message }}</span>
                                    @enderror
                                </div>
                             


                                <div class="col-md-12">
                                    <label>Status</label>
                                    <select name="status" class="form-select">
                                        <option value="1">Published</option>
                                        <option value="0" selected>Pending</option>
                                    </select>
                                </div>




                            </div>





                        </div>

                        <!-- Footer -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-info">Add Faq</button>
                            <a href="{{ route('faq.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>

                    </form>

                </div>

            </div>
        </div>
    </main>

@endsection
