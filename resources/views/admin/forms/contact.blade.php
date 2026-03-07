    @extends('admin.layouts.app2')
    @section('title', 'Add Services')

    @section('content')

        <main class="app-main">
            <div class="app-content">
                <div class="container-fluid">




                    <div class="card card-info card-outline">

                        <!-- Header -->
                        <div class="card-header">
                            <h3 class="card-title">Contact</h3>
                        </div>

                        <!-- Form -->
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="card-body">
                                <div class="row g-3">

                                    <!-- Service Name -->
                                    <div class="col-md-12">
                                        <label class="form-label">Full Name</label>
                                        <input type="text" name="name" class="form-control"
                                            placeholder="Enter Your Name" required>
                                    </div>

                                    <!-- Service Category -->
                                    <div class="col-md-6">
                                        <label class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control"
                                            placeholder="Enter Your email">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Phone</label>
                                        <input type="number" name="phone" class="form-control"
                                            placeholder="Enter Your Phone Number">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Description</label>
                                        <textarea id="editor" class="form-control"></textarea>
                                    </div>

                  





                                </div>
                            </div>


                            <div class="card-footer">
                                <button type="submit" class="btn btn-info">Submit</button>
                            </div>

                        </form>

                    </div>











                    

                </div>
            </div>
        </main>

    @endsection
