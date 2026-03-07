@extends('admin.layouts.app2')
@section('title', 'Add gallery')

@section('content')
    <div class="container">
        <h2>Upload Multiple Images</h2>

        <form action="" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Drag & Drop Area -->
            <div id="drop-area" class="border border-2 border-primary rounded p-5 text-center mb-3"
                style="cursor:pointer; background:#f8f9fa;">
                <p class="mb-2">Drag & Drop Images Here</p>
                <p class="text-muted">or Click to Select</p>
                <input type="file" name="images[]" id="images" multiple accept="image/*" hidden>
            </div>

            <!-- Preview Section -->
            <div class="row" id="preview"></div>

            <button class="btn btn-success mt-3">Upload</button>
        </form>
    </div>

    <div class="image-container mt-5">

        <div class="position-relative d-inline-block" style="width: 300px;">
            <div class="position-relative d-inline-block" style="width: 300px; height: 300px;">
                <img src="{{ asset('uploads/flower.jpg') }}" class="img-fluid rounded" alt="Sample Image"
                    style="width: 100%; height: 100%;">

                <!-- Delete Button -->
                <button onclick="showAlert()" class="btn btn-outline-danger btn-sm position-absolute top-0 start-0 m-2">
                    <i class="fa-solid fa-trash"></i>
                </button>
            </div>






        </div>
    </div>



    <script>
        document.addEventListener("DOMContentLoaded", function() {

            let dropArea = document.getElementById("drop-area");
            let input = document.getElementById("images");
            let preview = document.getElementById("preview");

            let selectedFiles = [];

            dropArea.addEventListener("click", () => input.click());

            ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                dropArea.addEventListener(eventName, e => e.preventDefault());
            });

            dropArea.addEventListener("drop", function(e) {
                handleFiles(e.dataTransfer.files);
            });

            input.addEventListener("change", function() {
                handleFiles(this.files);
            });

            function handleFiles(files) {

                Array.from(files).forEach(file => {
                    if (!file.type.startsWith("image/")) return;
                    selectedFiles.push(file);
                });

                showPreview();
            }

            function showPreview() {

                preview.innerHTML = "";

                selectedFiles.forEach((file, index) => {

                    let reader = new FileReader();

                    reader.onload = function(e) {

                        let col = document.createElement("div");
                        col.classList.add("col-md-3", "mb-3");

                        col.innerHTML = `
                    <div class="card shadow-sm position-relative">
                        <img src="${e.target.result}" 
                             class="card-img-top"
                             style="height:150px; object-fit:cover;">
                        <button type="button"
                                class="btn btn-danger btn-sm position-absolute top-0 end-0 m-1"
                                onclick="removeImage(${index})">
                            ✕
                        </button>
                    </div>
                `;

                        preview.appendChild(col);
                    };

                    reader.readAsDataURL(file);
                });

                updateInputFiles();
            }

            function updateInputFiles() {
                const dataTransfer = new DataTransfer();
                selectedFiles.forEach(file => dataTransfer.items.add(file));
                input.files = dataTransfer.files;
            }

            window.removeImage = function(index) {
                selectedFiles.splice(index, 1);
                showPreview();
            };

        });
    </script>

@endsection
