{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Popup Beside Button</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Popup styling */
        #adding {
            display: none;
            width: 320px;
            position: absolute;
            top: 0;
            left: 110%;
            z-index: 1000;
        }
    </style>
</head>
<body class="p-5">

    <div class="position-relative d-inline-block">
        <button id="btn" class="btn btn-primary">Click</button>

        <form action="" method="POST" enctype="multipart/form-data" 
              id="adding" class="card p-3 shadow">

            <div class="mb-2">
                <label class="form-label">Blog Title</label>
                <input type="text" name="title" class="form-control" placeholder="Enter blog title">
            </div>

            <div class="mb-2">
                <label class="form-label">Author Name</label>
                <input type="text" name="author" class="form-control" placeholder="Enter author name">
            </div>

            <div class="mb-2">
                <label class="form-label">Status</label>
                <select name="status" class="form-select">
                    <option value="published">Published</option>
                    <option value="draft">Draft</option>
                </select>
            </div>

            <div class="mb-2">
                <label class="form-label">Blog Content</label>
                <textarea name="content" rows="3" class="form-control"></textarea>
            </div>

            <div class="mb-2">
                <label class="form-label">Featured Image</label>
                <input type="file" name="image" class="form-control">
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-info btn-sm">Publish</button>
                <button type="button" id="closeBtn" class="btn btn-secondary btn-sm">Close</button>
            </div>

        </form>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script>
        $(document).ready(function() {

            // Toggle popup
            $("#btn").click(function(e) {
                e.preventDefault();
                $("#adding").fadeToggle(300);
            });

            // Close button
            $("#closeBtn").click(function() {
                $("#adding").fadeOut(300);
            });

            // Close when clicking outside
            // $(document).click(function(event) {
            //     if (!$(event.target).closest('#btn, #adding').length) {
            //         $("#adding").fadeOut(300);
            //     }
            // });

        });
    </script>

</body>
</html> --}}




<!DOCTYPE html>
<html>
<head>
    <title>Laravel Drag & Drop Upload</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #9db7cc;
        }

        .upload-area {
            border: 2px dashed #6c757d;
            border-radius: 15px;
            padding: 40px;
            text-align: center;
            cursor: pointer;
            transition: 0.3s;
            background-color: #f8f9fa;
        }

        .upload-area.dragover {
            background-color: #e7f1ff;
            border-color: #0d6efd;
        }

        #preview {
            max-width: 100%;
            border-radius: 10px;
            margin-top: 15px;
            display: none;
        }
    </style>
</head>
<body>

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow-lg p-4" style="width: 400px; border-radius: 20px;">

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                {{ $errors->first('image') }}
            </div>
        @endif

        <form action="" method="POST" enctype="multipart/form-data">
            @csrf

            <div id="dropArea" class="upload-area mb-3">
                <h5 class="fw-bold">Drag & Drop Image</h5>
                <p class="text-muted small">or Click to Select (Max 2MB)</p>
            </div>

            <input type="file" name="image" id="imageInput" class="d-none" accept="image/*">

            <img id="preview" class="img-fluid">

            <button type="submit" class="btn btn-primary w-100 mt-3">
                Upload Image
            </button>
        </form>
    </div>
</div>

<script>
    const dropArea = document.getElementById("dropArea");
    const imageInput = document.getElementById("imageInput");
    const preview = document.getElementById("preview");

    dropArea.addEventListener("click", () => imageInput.click());

    imageInput.addEventListener("change", function () {
        handleFile(this.files[0]);
    });

    dropArea.addEventListener("dragover", (e) => {
        e.preventDefault();
        dropArea.classList.add("dragover");
    });

    dropArea.addEventListener("dragleave", () => {
        dropArea.classList.remove("dragover");
    });

    dropArea.addEventListener("drop", (e) => {
        e.preventDefault();
        dropArea.classList.remove("dragover");

        const file = e.dataTransfer.files[0];
        imageInput.files = e.dataTransfer.files;
        handleFile(file);
    });

    function handleFile(file) {
        if (!file) return;

        const reader = new FileReader();
        reader.onload = function () {
            preview.src = reader.result;
            preview.style.display = "block";
        };
        reader.readAsDataURL(file);
    }
</script>

</body>
</html>