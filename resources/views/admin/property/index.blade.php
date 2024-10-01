@extends('admin.layouts.master')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Properties List</h4>
<<<<<<< HEAD
                    <a href="{{ route('admin.property.create') }}" class="btn btn-primary float-end">Add New
                        Property</a>
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
=======
                    <a href="{{ route('property.create') }}" class="btn btn-primary float-end">Add New Property</a>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
>>>>>>> bc57c5079346bc38c5f5131b83ef638abb3e899e
                        </div>
                    @endif

                    @if($properties->count() > 0)
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
<<<<<<< HEAD
                                    <th>S.N</th>
=======
                                    <th>ID</th>
>>>>>>> bc57c5079346bc38c5f5131b83ef638abb3e899e
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Sub Category</th>
                                    <th>Price</th>
                                    <th>Update Time</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($properties as $property)
                                    <tr>
<<<<<<< HEAD
                                        <td>{{ $loop->iteration }}</td>
=======
                                        <td>{{ $property->id }}</td>
>>>>>>> bc57c5079346bc38c5f5131b83ef638abb3e899e
                                        <td>{{ $property->title }}</td>
                                        <td>{{ $property->category->title }}</td>
                                        <td>{{ $property->subCategory->title }}</td>
                                        <td>${{ number_format($property->price, 2) }}</td>
<<<<<<< HEAD
                                        <td>{{ \Carbon\Carbon::parse($property->update_time)->format('Y M d') }}</td>
=======
                                        <td>{{ \Carbon\Carbon::parse($property->update_time)->format('Y - F - d') }}</td>
>>>>>>> bc57c5079346bc38c5f5131b83ef638abb3e899e
                                        <td>
                                            @if($property->status)
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
<<<<<<< HEAD
                                            <a href="{{ route('admin.property.edit', $property->id) }}"
                                                class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('admin.property.destroy', $property->id) }}" method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('Are you sure you want to delete this property?');">
=======
                                            <a href="{{ route('property.edit', $property->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('property.destroy', $property->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this property?');">
>>>>>>> bc57c5079346bc38c5f5131b83ef638abb3e899e
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>

<<<<<<< HEAD
                                            <!-- Button to trigger Image Modal -->
                                            <a href="javascript:void(0)" class="btn btn-outline-secondary btn-sm"
                                                data-bs-toggle="modal" data-bs-target="#imageModal{{ $property->id }}">
                                                <i class="fas fa-image"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    <!-- Image Modal for viewing and updating images -->
                                    <div class="modal fade" id="imageModal{{ $property->id }}" tabindex="-1"
                                        aria-labelledby="imageModalLabel{{ $property->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="imageModalLabel{{ $property->id }}">
                                                        Manage Images
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('admin.property.updateImages', $property->id) }}"
                                                        method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')

                                                        <!-- Main Image Section -->
                                                        <h5>Main Image</h5>
                                                        <div id="mainImagePreview" class="mb-3">
                                                            @foreach(json_decode($property->main_image) as $image)
                                                                <div class="card me-2 mb-2"
                                                                    style="max-width: 150px; display: inline-block;">
                                                                    <img src="{{ asset('/' . $image) }}" alt="Main Image"
                                                                        class="card-img-top"
                                                                        style="max-height: 150px; object-fit: cover;">
                                                                </div>
                                                            @endforeach
                                                        </div>

                                                        <div class="form-group mb-3">
                                                            <label for="main_image">Main Image</label>
                                                            <input type="file" id="main_image" class="form-control" >
                                                        </div>

                                                        <!-- Cropped Main Image Preview -->
                                                        <div class="form-group mb-3" id="cropped-preview-container"
                                                            style="display: none;">
                                                            <label>Cropped Main Image Preview:</label>
                                                            <img id="cropped-image-preview"
                                                                style="max-width: 150px; max-height: 200px; display: block;">
                                                        </div>

                                                        <!-- Hidden input to store the base64 string of the cropped image -->
                                                        <input type="hidden" name="main_image_base64" id="main_image_base64"
                                                            required>

                                                        <!-- Cropping Modal -->
                                                        <div class="modal fade" id="cropModal" tabindex="-1"
                                                            aria-labelledby="cropModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="cropModalLabel">Crop Image
                                                                        </h5>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <img id="image-preview"
                                                                            style="width: 100%; height: auto; display: none;">
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Close</button>
                                                                        <button type="button" id="saveCrop"
                                                                            class="btn btn-primary">Save Crop</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>



                                                        <!-- Other Images Section -->
                                                        @php        $otherImages = json_decode($property->other_images, true); @endphp
                                                        @if(!empty($otherImages))
                                                            <div id="otherImagesPreview" class="mb-3">
                                                                @foreach($otherImages as $image)
                                                                    <div class="card me-2 mb-2"
                                                                        style="max-width: 150px; display: inline-block;">
                                                                        <img src="{{ asset('/' . $image) }}" alt="Other Image"
                                                                            class="card-img-top"
                                                                            style="max-height: 150px; object-fit: cover;">
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        @endif

                                                        <div class="form-group mb-3">
                                                            <label for="other_images">Other Images</label>
                                                            <input type="file" id="other_images" class="form-control"
                                                                name="other_images[]" multiple>
                                                        </div>

                                                        <!-- Preview Container for the Other Images -->
                                                        <div class="form-group mb-3" id="other-images-preview-container"
                                                            style="display: none;">
                                                            <label>Selected Other Images Preview:</label>
                                                            <div id="other-images-preview"
                                                                style="display: flex; flex-wrap: wrap;"></div>
                                                        </div>





                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Cancel</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of Modal -->
=======
                                            <!-- Button to trigger Metadata Modal -->
                                            @if($property->metadata)
                                                <button type="button" class="btn btn-outline-info btn-sm" data-bs-toggle="modal" data-bs-target="#metadataModal{{ $property->id }}">
                                                    M
                                                </button>

                                                <!-- Metadata Modal with Edit Form -->
                                                <div class="modal fade" id="metadataModal{{ $property->id }}" tabindex="-1" aria-labelledby="metadataModalLabel{{ $property->id }}" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="metadataModalLabel{{ $property->id }}">Edit Metadata Details</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ route('metadata.update', $property->metadata->id) }}" method="POST">
                                                                    @csrf
                                                                    @method('PUT')

                                                                    <div class="form-group mb-3">
                                                                        <label for="meta_title">Meta Title</label>
                                                                        <input type="text" name="meta_title" id="meta_title" class="form-control" value="{{ old('meta_title', $property->metadata->meta_title) }}" required>
                                                                    </div>

                                                                    <div class="form-group mb-3">
                                                                        <label for="meta_description">Meta Description</label>
                                                                        <textarea name="meta_description" id="meta_description" class="form-control" rows="3" required>{{ old('meta_description', $property->metadata->meta_description) }}</textarea>
                                                                    </div>

                                                                    <div class="form-group mb-3">
                                                                        <label for="meta_keywords">Meta Keywords</label>
                                                                        <textarea name="meta_keywords" id="meta_keywords" class="form-control" rows="3" required>{{ old('meta_keywords', $property->metadata->meta_keywords) }}</textarea>
                                                                    </div>

                                                                    <div class="form-group mb-3">
                                                                        <label for="slug">Slug</label>
                                                                        <input type="text" name="slug" id="slug" class="form-control" value="{{ old('slug', $property->metadata->slug) }}" required>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </td>
                                    </tr>
>>>>>>> bc57c5079346bc38c5f5131b83ef638abb3e899e
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="alert alert-info">
<<<<<<< HEAD
                            No properties available. <a href="{{ route('admin.property.create') }}">Create a new
                                property</a>.
=======
                            No properties available. <a href="{{ route('property.create') }}">Create a new property</a>.
>>>>>>> bc57c5079346bc38c5f5131b83ef638abb3e899e
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<<<<<<< HEAD

<!-- Include Cropper.js -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>

<script>
    let cropper;
    let currentFile;

    // Main image input change event
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

            // Initialize Cropper.js
            if (cropper) {
                cropper.destroy();
            }
            cropper = new Cropper(imagePreview, {
                aspectRatio: 16 / 9, // You can change the aspect ratio as needed
                viewMode: 1,
            });
        }
    });
    document.getElementById('other_images').addEventListener('change', function (e) {
        const files = e.target.files;
        const previewContainer = document.getElementById('other-images-preview');
        previewContainer.innerHTML = ''; // Clear previous previews
        document.getElementById('other-images-preview-container').style.display = 'block'; // Show the preview container

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


    // Save cropped image data and update hidden input fields
    document.getElementById('saveCrop').addEventListener('click', function () {
        if (!cropper) return;

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

                // Close modal after saving crop
                const cropModal = bootstrap.Modal.getInstance(document.getElementById('cropModal'));
                cropModal.hide();
            };
        }, 'image/png');
    });


</script>
=======
>>>>>>> bc57c5079346bc38c5f5131b83ef638abb3e899e
@endsection