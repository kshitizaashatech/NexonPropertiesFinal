@extends('admin.layouts.master')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Property</h4>
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

<<<<<<< HEAD
                    <!-- Property edit form -->
                    <form action="{{ route('admin.property.update', $property->id) }}" method="POST"
                        enctype="multipart/form-data" id="propertyForm">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="cropData" id="cropData">
                        <input type="hidden" name="main_image_cropped" id="croppedImage">
=======
                    <!-- Property update form -->
                    <form action="{{ route('property.update', $property->id) }}" method="POST" enctype="multipart/form-data"
                        id="propertyForm">
                        @csrf
                        @method('PUT')
>>>>>>> bc57c5079346bc38c5f5131b83ef638abb3e899e

                        <!-- Title -->
                        <div class="form-group mb-3">
                            <label for="title">Title</label>
<<<<<<< HEAD
                            <input type="text" name="title" id="title" class="form-control"
                                value="{{ old('title', $property->title) }}" required>
=======
                            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $property->title) }}" required>
>>>>>>> bc57c5079346bc38c5f5131b83ef638abb3e899e
                        </div>

                        <!-- Description -->
                        <div class="form-group mb-3">
                            <label for="description">Description</label>
<<<<<<< HEAD
                            <textarea name="description" id="description" class="form-control" rows="5"
                                required>{{ old('description', $property->description) }}</textarea>
                        </div>

                        <!-- Category -->
                        <div class="form-group mb-3">
                            <label for="category_id">Category</label>
                            <select name="category_id" id="category_id" class="form-control" required>
                                <option value="">Choose Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id', $property->category_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Sub Category -->
                        <div class="form-group mb-3">
                            <label for="sub_category_id">Sub Category</label>
                            <select name="sub_category_id" id="sub_category_id" class="form-control" required>
                                <option value="">Choose Sub Category</option>
                                @foreach($subCategories as $subCategory)
                                    <option value="{{ $subCategory->id }}" {{ old('sub_category_id', $property->sub_category_id) == $subCategory->id ? 'selected' : '' }}>
                                        {{ $subCategory->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
=======
                            <textarea name="description" id="description" class="form-control" rows="5" required>{{ old('description', $property->description) }}</textarea>
                        </div>

                        <!-- Category -->
                    <div class="form-group mb-3">
                        <label for="category_id">Category</label>
                        <select class="form-control" id="category_id" name="category_id" required>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $property->category_id == $category->id ? 'selected' : '' }}>
                                    {{ $category->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Sub Category -->
                    <div class="form-group mb-3">
                        <label for="sub_category_id">Sub Category</label>
                        <select class="form-control" id="sub_category_id" name="sub_category_id" required>
                            @foreach($subCategories as $subCategory)
                                <option value="{{ $subCategory->id }}" {{ $property->sub_category_id == $subCategory->id ? 'selected' : '' }}>
                                    {{ $subCategory->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>

>>>>>>> bc57c5079346bc38c5f5131b83ef638abb3e899e

                        <!-- Street -->
                        <div class="form-group mb-3">
                            <label for="street">Street</label>
<<<<<<< HEAD
                            <input type="text" name="street" id="street" class="form-control"
                                value="{{ old('street', $property->street) }}" required>
=======
                            <input type="text" name="street" id="street" class="form-control" value="{{ old('street', $property->street) }}" required>
>>>>>>> bc57c5079346bc38c5f5131b83ef638abb3e899e
                        </div>

                        <!-- Suburb -->
                        <div class="form-group mb-3">
                            <label for="suburb">Suburb</label>
<<<<<<< HEAD
                            <input type="text" name="suburb" id="suburb" class="form-control"
                                value="{{ old('suburb', $property->suburb) }}" required>
=======
                            <input type="text" name="suburb" id="suburb" class="form-control" value="{{ old('suburb', $property->suburb) }}" required>
>>>>>>> bc57c5079346bc38c5f5131b83ef638abb3e899e
                        </div>

                        <!-- State -->
                        <div class="form-group mb-3">
                            <label for="state">State</label>
<<<<<<< HEAD
                            <input type="text" name="state" id="state" class="form-control"
                                value="{{ old('state', $property->state) }}" required>
=======
                            <input type="text" name="state" id="state" class="form-control" value="{{ old('state', $property->state) }}" required>
>>>>>>> bc57c5079346bc38c5f5131b83ef638abb3e899e
                        </div>

                        <!-- Post Code -->
                        <div class="form-group mb-3">
                            <label for="post_code">Post Code</label>
<<<<<<< HEAD
                            <input type="number" name="post_code" id="post_code" min="0" minlength="4"
                                class="form-control" value="{{ old('post_code', $property->post_code) }}" required>
                        </div>

                        <!-- Country -->
                        <div class="form-group mb-3">
                            <label for="country">Country</label>
                            <input type="text" name="country" id="country" class="form-control"
                                value="{{ old('country', $property->country) }}">
=======
                            <input type="text" name="post_code" id="post_code" class="form-control" value="{{ old('post_code', $property->post_code) }}" required>
>>>>>>> bc57c5079346bc38c5f5131b83ef638abb3e899e
                        </div>

                        <!-- Price -->
                        <div class="form-group mb-3">
                            <label for="price">Price</label>
<<<<<<< HEAD
                            <input type="number" name="price" id="price" class="form-control" min="0"
                                value="{{ old('price', $property->price) }}" required>
=======
                            <input type="number" name="price" id="price" class="form-control" value="{{ old('price', $property->price) }}" required>
>>>>>>> bc57c5079346bc38c5f5131b83ef638abb3e899e
                        </div>

                        <!-- Price Type -->
                        <div class="form-group mb-3">
                            <label for="price_type">Price Type</label>
<<<<<<< HEAD
                            <select name="price_type" id="price_type" class="form-control" required>
                                <option value="fixed" {{ old('price_type', $property->price_type) == 'fixed' ? 'selected' : '' }}>Fixed</option>
                                <option value="negotiable" {{ old('price_type', $property->price_type) == 'negotiable' ? 'selected' : '' }}>Negotiable</option>
                                <option value="on_request" {{ old('price_type', $property->price_type) == 'on_request' ? 'selected' : '' }}>On Request</option>
=======
                            <select class="form-control" id="price_type" name="price_type" required>
                                <option value="fixed" {{ $property->price_type == 'fixed' ? 'selected' : '' }}>Fixed</option>
                                <option value="negotiable" {{ $property->price_type == 'negotiable' ? 'selected' : '' }}>Negotiable</option>
                                <option value="on_request" {{ $property->price_type == 'on_request' ? 'selected' : '' }}>On Request</option>
>>>>>>> bc57c5079346bc38c5f5131b83ef638abb3e899e
                            </select>
                        </div>

                        <!-- Bedrooms -->
                        <div class="form-group mb-3">
                            <label for="bedrooms">Bedrooms</label>
<<<<<<< HEAD
                            <input type="number" name="bedrooms" id="bedrooms" class="form-control" min="0"
                                value="{{ old('bedrooms', $property->bedrooms) }}" required>
=======
                            <input type="number" name="bedrooms" id="bedrooms" class="form-control" value="{{ old('bedrooms', $property->bedrooms) }}" required>
>>>>>>> bc57c5079346bc38c5f5131b83ef638abb3e899e
                        </div>

                        <!-- Bathrooms -->
                        <div class="form-group mb-3">
                            <label for="bathrooms">Bathrooms</label>
<<<<<<< HEAD
                            <input type="number" name="bathrooms" id="bathrooms" class="form-control" min="0"
                                value="{{ old('bathrooms', $property->bathrooms) }}" required>
=======
                            <input type="number" name="bathrooms" id="bathrooms" class="form-control" value="{{ old('bathrooms', $property->bathrooms) }}" required>
>>>>>>> bc57c5079346bc38c5f5131b83ef638abb3e899e
                        </div>

                        <!-- Area -->
                        <div class="form-group mb-3">
                            <label for="area">Area (sq ft)</label>
<<<<<<< HEAD
                            <input type="number" name="area" id="area" class="form-control" min="0"
                                value="{{ old('area', $property->area) }}" required>
                        </div>

                        <!-- Status -->
                        <div class="form-group mb-3">
                            <label for="status">Status</label>
                            <div class="form-check">
                                <input type="radio" name="status" id="status_active" value="1" class="form-check-input"
                                    {{ old('status', $property->status) == '1' ? 'checked' : '' }} required>
                                <label for="status_active" class="form-check-label">Active</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" name="status" id="status_inactive" value="0"
                                    class="form-check-input" {{ old('status', $property->status) == '0' ? 'checked' : '' }} required>
                                <label for="status_inactive" class="form-check-label">Inactive</label>
                            </div>
=======
                            <input type="number" name="area" id="area" class="form-control" value="{{ old('area', $property->area) }}" required>
>>>>>>> bc57c5079346bc38c5f5131b83ef638abb3e899e
                        </div>

                        <!-- Availability Status -->
                        <div class="form-group mb-3">
                            <label for="availability_status">Availability Status</label>
                            <select name="availability_status" id="availability_status" class="form-control" required>
<<<<<<< HEAD
                                <option value="available" {{ old('availability_status', $property->availability_status) == 'available' ? 'selected' : '' }}>Available</option>
                                <option value="sold" {{ old('availability_status', $property->availability_status) == 'sold' ? 'selected' : '' }}>Sold</option>
                                <option value="rental" {{ old('availability_status', $property->availability_status) == 'rental' ? 'selected' : '' }}>Rental</option>
                            </select>
                        </div>

                        <!-- Rental Period -->
                        <div class="form-group mb-3">
                            <label for="rental_period">Rental Period</label>
                            <input type="text" name="rental_period" id="rental_period" class="form-control"
                                value="{{ old('rental_period', $property->rental_period) }}">
                        </div>

                   
                    
                       
                       

                        <!-- Keywords -->
                        <div class="form-group mb-3">
                            <label for="keywords">Keywords</label>
                            <input type="text" name="keywords" id="keywords" class="form-control"
                                value="{{ old('keywords', $property->metadata->meta_keywords) }}">
=======
                                <option value="available" {{ $property->availability_status == 'available' ? 'selected' : '' }}>Available</option>
                                <option value="sold" {{ $property->availability_status == 'sold' ? 'selected' : '' }}>Sold</option>
                                <option value="rental" {{ $property->availability_status == 'rental' ? 'selected' : '' }}>Rental</option>
                            </select>
                        </div>

                        <!-- Main Image Upload with Cropper.js -->
                        <div class="form-group mb-3">
                            <label for="main_image">Upload New Image</label>
                            <input type="file" id="main_image" class="form-control" accept="image/*">
                        </div>

                        <!-- Hidden Inputs for Base64 Image -->
                        <input type="hidden" name="main_image[]" id="croppedImage">
                        <input type="hidden" name="cropData" id="cropData">

                        <!-- Cropped Image Preview -->
                        <div class="form-group mb-3" id="cropped-preview-container" style="display: none;">
                            <label>Cropped Image Preview:</label>
                            <img id="cropped-image-preview" style="max-width: 100%; max-height: 200px; display: block;">
                        </div>
                        <div class="form-group mb-3">
                            <label for="other_images">Other Images</label>
                            <input type="file" id="other_images" class="form-control" name="other_images[]" multiple>
                        </div>
                        <!-- Other Images Preview -->
                        <div class="form-group mb-3" id="other-images-preview-container" style="display: none;">
                            <label>Selected Other Images Preview:</label>
                            <div id="other-images-preview" style="display: flex; flex-wrap: wrap;"></div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="status">Status</label>
                            <div class="form-check">
                                <input type="radio" name="status" id="status_active" value="1" class="form-check-input" 
                                       {{ old('status', $property->status) == '1' ? 'checked' : '' }} required>
                                <label for="status_active" class="form-check-label">Active</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" name="status" id="status_inactive" value="0" class="form-check-input" 
                                       {{ old('status', $property->status) == '0' ? 'checked' : '' }} required>
                                <label for="status_inactive" class="form-check-label">Inactive</label>
                            </div>
>>>>>>> bc57c5079346bc38c5f5131b83ef638abb3e899e
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update Property</button>
<<<<<<< HEAD
                            <a href="{{ route('admin.property.index') }}" class="btn btn-secondary">Cancel</a>
=======
                            <a href="{{ route('property.index') }}" class="btn btn-secondary">Cancel</a>
>>>>>>> bc57c5079346bc38c5f5131b83ef638abb3e899e
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
<<<<<<< HEAD
                <img id="image-preview" style="width: 100%; height: auto; display: none;">
=======
                <img id="image-preview" style="max-width: 100%; max-height: 150%; display: none;">
>>>>>>> bc57c5079346bc38c5f5131b83ef638abb3e899e
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
=======
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
>>>>>>> bc57c5079346bc38c5f5131b83ef638abb3e899e

<script>
    let cropper;
    let currentFile;

<<<<<<< HEAD
    // Main image input change event
=======
    // Image file input change event
>>>>>>> bc57c5079346bc38c5f5131b83ef638abb3e899e
    document.getElementById('main_image').addEventListener('change', function (e) {
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
<<<<<<< HEAD
        if (!cropper) return;

=======
>>>>>>> bc57c5079346bc38c5f5131b83ef638abb3e899e
        const cropData = cropper.getData();
        document.getElementById('cropData').value = JSON.stringify({
            width: Math.round(cropData.width),
            height: Math.round(cropData.height),
            x: Math.round(cropData.x),
            y: Math.round(cropData.y)
        });

<<<<<<< HEAD
        cropper.getCroppedCanvas().toBlob((blob) => {
            const reader = new FileReader();
            reader.readAsDataURL(blob);
            reader.onloadend = function () {
                // Set the base64 string of the cropped image into the hidden input
                document.getElementById('main_image_base64').value = reader.result;

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

    // Preview for other images
    document.getElementById('other_images').addEventListener('change', function (e) {
        const files = e.target.files;
        const previewContainer = document.getElementById('other-images-preview');
        previewContainer.innerHTML = ''; // Clear previous previews
        document.getElementById('other-images-preview-container').style.display = 'block';

        Array.from(files).forEach(file => {
            const reader = new FileReader();
            reader.onload = function (event) {
                const img = document.createElement('img');
                img.src = event.target.result;
                img.style.maxWidth = '100px';
                img.style.margin = '5px';
                img.style.border = '1px solid #ccc';
                img.style.padding = '2px';
                previewContainer.appendChild(img);
            };
            reader.readAsDataURL(file);
        });
    });

    // Show toast message after form submission
    document.addEventListener('DOMContentLoaded', function () {
=======
        const base64Image = cropper.getCroppedCanvas().toDataURL('image/png');
        document.getElementById('croppedImage').value = base64Image; // Store the base64 string

        // Set cropped image preview
        const croppedImagePreview = document.getElementById('cropped-image-preview');
        croppedImagePreview.src = base64Image;
        document.getElementById('cropped-preview-container').style.display = 'block';

        // Close modal after saving crop
        const cropModal = bootstrap.Modal.getInstance(document.getElementById('cropModal'));
        cropModal.hide();
    });

    // jQuery Validation
    $(document).ready(function () {
        $('#propertyForm').validate({
            rules: {
                title: { required: true },
                description: { required: true },
                category_id: { required: true },
                sub_category_id: { required: true },
                street: { required: true },
                suburb: { required: true },
                state: { required: true },
                post_code: { required: true },
                price: { required: true, number: true },
                price_type: { required: true },
                bedrooms: { required: true, number: true },
                bathrooms: { required: true, number: true },
                area: { required: true, number: true },
                availability_status: { required: true }
            },
            messages: {
                title: { required: "The title field is required." },
                description: { required: "The description field is required." },
                category_id: { required: "Please select a category." },
                sub_category_id: { required: "Please select a subcategory." },
                street: { required: "The street field is required." },
                suburb: { required: "The suburb field is required." },
                state: { required: "The state field is required." },
                post_code: { required: "The post code field is required." },
                price: { required: "The price field is required.", number: "The price must be a number." },
                price_type: { required: "The price type field is required." },
                bedrooms: { required: "The bedrooms field is required.", number: "The bedrooms must be a number." },
                bathrooms: { required: "The bathrooms field is required.", number: "The bathrooms must be a number." },
                area: { required: "The area field is required.", number: "The area must be a number." },
                availability_status: { required: "The availability status field is required." }
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });

        // Show toast message after form submission
>>>>>>> bc57c5079346bc38c5f5131b83ef638abb3e899e
        if (document.querySelector('.toast')) {
            const toast = new bootstrap.Toast(document.querySelector('.toast'));
            toast.show();
        }
    });
<<<<<<< HEAD
=======
    //For dynamic loading subcategories
    
    document.getElementById('category_id').addEventListener('change', function () {
        const categoryId = this.value;
        const subCategorySelect = document.getElementById('sub_category_id');
        
        // Clear existing options
        subCategorySelect.innerHTML = '<option value="">Select Sub Category</option>';

        if (categoryId) {
            fetch(`{{ url('/subcategories') }}/${categoryId}`)
                .then(response => response.json())
                .then(subcategories => {
                    subcategories.forEach(subcategory => {
                        const option = document.createElement('option');
                        option.value = subcategory.id;
                        option.textContent = subcategory.title;
                        subCategorySelect.appendChild(option);
                    });
                })
                .catch(error => console.error('Error fetching subcategories:', error));
        }
    });
</script>
>>>>>>> bc57c5079346bc38c5f5131b83ef638abb3e899e
</script>
@endsection