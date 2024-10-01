<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" rel="stylesheet">
</head>
<body>
@extends('admin.layouts.master')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h4>Create New About Us Entry</h4>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="toast align-items-center text-white bg-success border-0 position-fixed bottom-0 end-0 p-3"
                            role="alert" aria-live="assertive" aria-atomic="true" id="toastMessage">
                            <div class="d-flex">
                                <div class="toast-body">
                                    {{ session('success') }}
                                </div>
                                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                                    aria-label="Close"></button>
                            </div>
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <!-- About Us creation form -->
                    <form action="{{ route('admin.aboutus.store') }}" method="POST" enctype="multipart/form-data" id="aboutUsForm">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="subtitle">Subtitle</label>
                            <input type="text" name="subtitle" id="subtitle" class="form-control" value="{{ old('subtitle') }}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="description">Description</label>
                            <textarea class="form-control summernote" id="description" name="description" rows="10" required>{{ old('description') }}</textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="keywords">Keywords</label>
                            <textarea name="keywords" id="keywords" class="form-control" rows="5" required>{{ old('keywords') }}</textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="image">Images</label>
                            <input type="file" name="image[]" id="image" class="form-control" multiple required>
                        </div>
                        {{-- <!-- Image Upload with Cropper.js -->
                        <div class="form-group mb-3">
<<<<<<< HEAD
                            <label for="image">Images</label>
                            <input type="file" name="image[]" id="image" class="form-control" multiple required>
                        </div>

=======
                            <label for="image">Image</label>
                            <input type="file" id="image" class="form-control" required>
                        </div> --}}
>>>>>>> bc57c5079346bc38c5f5131b83ef638abb3e899e
                        <!-- Crop Data Hidden Field -->
                        <input type="hidden" name="cropData" id="cropData">
                        <!-- Hidden input to simulate array submission -->
<<<<<<< HEAD
                        <input type="hidden" name="croppedImage" id="croppedImage">
=======
                        <input type="hidden" name="image[]" id="croppedImage">
>>>>>>> bc57c5079346bc38c5f5131b83ef638abb3e899e
                        <!-- Cropped Image Preview -->
                        <div class="form-group mb-3" id="cropped-preview-container" style="display: none;">
                            <label>Cropped Image Preview:</label>
                            <div id="cropped-images-preview"></div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="status">Status</label>
                            <div class="form-check">
                                <input type="radio" name="status" id="status_active" value="1" class="form-check-input" {{ old('status') == '1' ? 'checked' : '' }} required>
                                <label for="status_active" class="form-check-label">Active</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" name="status" id="status_inactive" value="0" class="form-check-input" {{ old('status') == '0' ? 'checked' : '' }} required>
                                <label for="status_inactive" class="form-check-label">Inactive</label>
                            </div>
                        </div>
<<<<<<< HEAD

=======
>>>>>>> bc57c5079346bc38c5f5131b83ef638abb3e899e
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Create About Us</button>
                            <a href="{{ route('admin.aboutus.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal for Image Cropping -->
<div class="modal fade" id="cropModal" tabindex="-1" aria-labelledby="cropModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cropModalLabel">Crop Image</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img id="image-preview" style="width: 10%; height: 10%; display: none;">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" id="saveCrop" class="btn btn-primary">Save Crop</button>
            </div>
        </div>
    </div>
</div>
<!-- Include Cropper.js -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
<<<<<<< HEAD
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>

let cropper;
let imagesToProcess = [];
let processedImages = [];
let cropDataArray = [];

document.getElementById('image').addEventListener('change', function (e) {
    imagesToProcess = Array.from(e.target.files);
    processedImages = [];
    cropDataArray = [];
    if (imagesToProcess.length > 0) {
        processNextImage();
    }
});

function processNextImage() {
    if (imagesToProcess.length === 0) {
        document.getElementById('cropped-preview-container').style.display = 'block';
        return;
    }

    const file = imagesToProcess.shift();
    const url = URL.createObjectURL(file);
    const imagePreview = document.getElementById('image-preview');
    imagePreview.src = url;
    imagePreview.style.display = 'block';

    const cropModal = new bootstrap.Modal(document.getElementById('cropModal'));
    cropModal.show();

    if (cropper) {
        cropper.destroy();
    }
    cropper = new Cropper(imagePreview, {
        aspectRatio: 16 / 9,
        viewMode: 1,
    });

    document.getElementById('saveCrop').onclick = function () {
=======
<script>
    let cropper;
    let currentFile;
    // Image file input change event
    document.getElementById('image').addEventListener('change', function (e) {
        const files = e.target.files;
        if (files && files.length > 0) {
            currentFile = files[0];
            const url = URL.createObjectURL(currentFile);
            const imagePreview = document.getElementById('image-preview');
            imagePreview.src = url;
            imagePreview.style.display = 'block';
            // Show the crop modal
            const cropModal = new bootstrap.Modal(document.getElementById('cropModal'));
            cropModal.show();
            if (cropper) {
                cropper.destroy();
            }
            cropper = new Cropper(imagePreview, {
                aspectRatio: 16 / 9,
                viewMode: 1,
            });
        }
    });
    // Save cropped image data and update hidden input fields
    document.getElementById('saveCrop').addEventListener('click', function () {
>>>>>>> bc57c5079346bc38c5f5131b83ef638abb3e899e
        if (!cropper) return;
        const cropData = cropper.getData();
        cropDataArray.push(JSON.stringify({
            width: Math.round(cropData.width),
            height: Math.round(cropData.height),
            x: Math.round(cropData.x),
            y: Math.round(cropData.y)
<<<<<<< HEAD
        }));

=======
        });
>>>>>>> bc57c5079346bc38c5f5131b83ef638abb3e899e
        cropper.getCroppedCanvas().toBlob((blob) => {
            const reader = new FileReader();
            reader.readAsDataURL(blob);
            reader.onloadend = function () {
<<<<<<< HEAD
                processedImages.push(reader.result);

                // Show cropped image preview
                const croppedImagesPreview = document.getElementById('cropped-images-preview');
                const img = document.createElement('img');
                img.src = reader.result;
                img.style.maxWidth = '150px';
                img.style.maxHeight = '200px';
                croppedImagesPreview.appendChild(img);

                cropModal.hide();
                
                // Process next image or finish
                if (imagesToProcess.length > 0) {
                    processNextImage();
                } else {
                    finishImageProcessing();
                }
            };
        }, 'image/png');
    };
}

function finishImageProcessing() {
    document.getElementById('cropData').value = JSON.stringify(cropDataArray);
    document.getElementById('croppedImage').value = JSON.stringify(processedImages);
    document.getElementById('cropped-preview-container').style.display = 'block';
}

// Form submission
document.getElementById('aboutUsForm').addEventListener('submit', function(e) {
    if (imagesToProcess.length > 0) {
        e.preventDefault();
        alert('Please finish cropping all images before submitting.');
        return;
    }
    // Form will submit normally if all images are processed
});
=======
                document.getElementById('croppedImage').value = reader.result;
                // Set cropped image preview
                const croppedImagePreview = document.getElementById('cropped-image-preview');
                croppedImagePreview.src = reader.result;
                document.getElementById('cropped-preview-container').style.display = 'block';
            };
            // Close modal after saving crop
            const cropModal = bootstrap.Modal.getInstance(document.getElementById('cropModal'));
            cropModal.hide();
        }, 'image/png');
    });
    // Show toast message after form submission
    document.addEventListener('DOMContentLoaded', function () {
        if (document.querySelector('.toast')) {
            const toast = new bootstrap.Toast(document.querySelector('.toast'));
            toast.show();
        }
    });
>>>>>>> bc57c5079346bc38c5f5131b83ef638abb3e899e
</script>
@endsection