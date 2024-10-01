<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Metadata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
<<<<<<< HEAD
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
=======
>>>>>>> bc57c5079346bc38c5f5131b83ef638abb3e899e

class PropertyController extends Controller
{
    /**
     * Display a listing of the properties.
     */
    public function index()
    {
<<<<<<< HEAD
        $properties = Property::with('metadata', 'category', 'subCategory')->latest()->get();
=======
        $properties = Property::with('metadata')->latest()->get();
>>>>>>> bc57c5079346bc38c5f5131b83ef638abb3e899e
        return view('admin.property.index', compact('properties'));
    }

    /**
     * Show the form for creating a new property.
     */
    public function create()
    {
        $categories = Category::all();
        $subCategories = SubCategory::all();
        $metadata = Metadata::all();
        return view('admin.property.create', compact('categories', 'subCategories', 'metadata'));
    }

    /**
     * Store a newly created property in storage.
     */
    public function store(Request $request)
    {
<<<<<<< HEAD
        // Validate the input data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'main_image' => 'required|array',
            'main_image.*' => 'required|string', // Assuming base64 format
=======
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'main_image' => 'required|array', // Ensure main_image is an array
            'main_image.*' => 'required|string', // Validate as a string since it's a base64 image
            'cropData' => 'required|string',
>>>>>>> bc57c5079346bc38c5f5131b83ef638abb3e899e
            'category_id' => 'required|exists:categories,id',
            'sub_category_id' => 'required|exists:sub_categories,id',
            'street' => 'required|string|max:255',
            'suburb' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'post_code' => 'required|string|max:20',
            'country' => 'nullable|string|max:255',
            'price' => 'required|numeric',
            'price_type' => 'required|in:fixed,negotiable,on_request',
            'bedrooms' => 'required|integer',
            'bathrooms' => 'required|integer',
            'area' => 'required|integer',
            'status' => 'required|boolean',
            'availability_status' => 'required|in:available,sold,rental',
            'rental_period' => 'nullable|string',
            'keywords' => 'nullable|string',
<<<<<<< HEAD
            'other_images' => 'required|array',
            'other_images.*' => 'required|file|mimes:jpg,jpeg,png,webp|max:2048',
=======
            'other_images' => 'required|array', // Ensure other_images is an array
            'other_images.*' => 'required|file|mimes:jpg,jpeg,png,webp|max:2048', 
            
>>>>>>> bc57c5079346bc38c5f5131b83ef638abb3e899e
        ]);

        // Handle the main image upload (base64 images)
        $images = $this->handleBase64Images($request->input('main_image'), 'property');

        // Handle other images upload
<<<<<<< HEAD
        $otherImages = $this->handleUploadedImages($request->file('other_images'), 'property/other_images');

        // Create a metadata entry
        $metadata = Metadata::create([
            'meta_title' => $request->title,
            'meta_description' => $request->description,
            'meta_keywords' => $request->suburb,
=======
        $otherImages = $this->handleUploadedImages($request->file('other_images'), 'property/other-images');

        // Create a metadata entry
        $metaKeywordsArray = array_map('trim', explode(',', $request->keywords));
        $metadata = Metadata::create([
            'meta_title' => $request->title,
            'meta_description' => $request->description,
            'meta_keywords' => json_encode($metaKeywordsArray),
>>>>>>> bc57c5079346bc38c5f5131b83ef638abb3e899e
            'slug' => Str::slug($request->title),
        ]);

        // Create new property record and associate with metadata
        Property::create([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'street' => $request->street,
            'suburb' => $request->suburb,
            'state' => $request->state,
            'post_code' => $request->post_code,
            'country' => $request->country,
            'price' => $request->price,
            'price_type' => $request->price_type,
            'bedrooms' => $request->bedrooms,
            'bathrooms' => $request->bathrooms,
            'area' => $request->area,
            'status' => $request->status,
            'main_image' => json_encode($images),
            'other_images' => json_encode($otherImages),
            'availability_status' => $request->availability_status,
            'rental_period' => $request->rental_period,
            'metadata_id' => $metadata->id,
<<<<<<< HEAD
            'update_time' => Carbon::now(),
=======
            'update_time' => now()->toDateString(),
>>>>>>> bc57c5079346bc38c5f5131b83ef638abb3e899e
        ]);

        session()->flash('success', 'Property created successfully.');

<<<<<<< HEAD
        return redirect()->route('admin.property.index');
=======
        return redirect()->route('property.index');
>>>>>>> bc57c5079346bc38c5f5131b83ef638abb3e899e
    }

    /**
     * Display the specified property.
     */
    public function show(Property $property)
    {
        return view('admin.property.show', compact('property'));
    }

    /**
     * Show the form for editing the specified property.
     */
    public function edit(Property $property)
    {
        $categories = Category::all();
        $subCategories = SubCategory::all();
        $metadata = Metadata::all();
<<<<<<< HEAD

=======
>>>>>>> bc57c5079346bc38c5f5131b83ef638abb3e899e
        return view('admin.property.update', compact('property', 'categories', 'subCategories', 'metadata'));
    }

    /**
     * Update the specified property in storage.
     */
    public function update(Request $request, Property $property)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
<<<<<<< HEAD
            'main_image' => 'nullable|array',
            'main_image.*' => 'nullable|string',
=======
            'main_image' => 'sometimes|array',
            'main_image.*' => 'sometimes|string',
            'cropData' => 'sometimes|string',
>>>>>>> bc57c5079346bc38c5f5131b83ef638abb3e899e
            'category_id' => 'required|exists:categories,id',
            'sub_category_id' => 'required|exists:sub_categories,id',
            'street' => 'required|string|max:255',
            'suburb' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'post_code' => 'required|string|max:20',
            'country' => 'nullable|string|max:255',
            'price' => 'required|numeric',
            'price_type' => 'required|in:fixed,negotiable,on_request',
            'bedrooms' => 'required|integer',
            'bathrooms' => 'required|integer',
            'area' => 'required|integer',
            'status' => 'required|boolean',
            'availability_status' => 'required|in:available,sold,rental',
            'rental_period' => 'nullable|string',
            'keywords' => 'nullable|string',
<<<<<<< HEAD
            'other_images' => 'nullable|array',
            'other_images.*' => 'nullable|file|mimes:jpg,jpeg,png,webp|max:2048',
            'update_time' => Carbon::now(),
        ]);

        // Handle main image update if provided
        if ($request->has('main_image')) {
            $this->deleteImages(json_decode($property->main_image, true), 'property/');
            $images = $this->handleBase64Images($request->input('main_image'), 'property');
        } else {
            $images = json_decode($property->main_image, true);
        }

        // Handle other images update if provided
        if ($request->hasFile('other_images')) {
            $this->deleteImages(json_decode($property->other_images, true), 'property/other_images/');
            $otherImages = $this->handleUploadedImages($request->file('other_images'), 'property/other_images');
        } else {
            $otherImages = json_decode($property->other_images, true);
        }

        // Update metadata record
        $property->metadata()->updateOrCreate([], [
            'meta_title' => $request->title,
            'meta_description' => $request->description,
            'meta_keywords' => $request->suburb,
=======
            'other_images' => 'required|array',
            'other_images.*' => 'required|file|mimes:jpg,jpeg,png,webp|max:2048',
            'update_time' => now()->toDateString(),
        ]);

        // Handle main image update
        $images = $this->handleBase64Images($request->input('main_image'), 'property', $property->main_image);

        // Handle other images update
        $otherImages = $this->handleUploadedImages($request->file('other_images'), 'property/other-images', $property->other_images);

        // Update metadata record
        $metaKeywordsArray = array_map('trim', explode(',', $request->keywords));
        $property->metadata()->updateOrCreate([], [
            'meta_title' => $request->title,
            'meta_description' => $request->description,
            'meta_keywords' => json_encode($metaKeywordsArray),
>>>>>>> bc57c5079346bc38c5f5131b83ef638abb3e899e
            'slug' => Str::slug($request->title),
        ]);

        // Update the property record
        $property->update([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'street' => $request->street,
            'suburb' => $request->suburb,
            'state' => $request->state,
            'post_code' => $request->post_code,
            'country' => $request->country,
            'price' => $request->price,
            'price_type' => $request->price_type,
            'bedrooms' => $request->bedrooms,
            'bathrooms' => $request->bathrooms,
            'area' => $request->area,
            'status' => $request->status,
<<<<<<< HEAD
            'other_images' => json_encode($otherImages),
            'availability_status' => $request->availability_status,
            'rental_period' => $request->rental_period,
            'update_time' => Carbon::now(),
=======
            'main_image' => json_encode($images),
            'other_images' => json_encode($otherImages),
            'availability_status' => $request->availability_status,
            'rental_period' => $request->rental_period,
            'update_time' => now()->toDateString(),
>>>>>>> bc57c5079346bc38c5f5131b83ef638abb3e899e
        ]);

        session()->flash('success', 'Property updated successfully.');

<<<<<<< HEAD
        return redirect()->route('admin.property.index');
    }

    /**
     * Handle base64 image uploads and convert them to WEBP.
     */
    private function handleBase64Images(array $base64Images, $folder, $existingImages = [])
    {
        // Initialize with existing images if provided
        $images = !empty($existingImages) ? $existingImages : [];

        foreach ($base64Images as $base64Image) {
            // Extract base64 encoded part and decode it
            $image = explode(',', $base64Image);
            if (isset($image[1])) {
                $decodedImage = base64_decode($image[1]);
            } else {
                continue; // Skip if the base64 string is not properly formatted
            }
            $imageResource = imagecreatefromstring($decodedImage);

            if ($imageResource !== false) {
                // Generate unique image name
                $imageName = time() . '-' . Str::uuid() . '.webp';
                // Correct destination path
                $destinationPath = storage_path("app/public/$folder");

                // Create the directory if it does not exist
                if (!File::exists($destinationPath)) {
                    File::makeDirectory($destinationPath, 0755, true, true);
                }

                // Save the image in WEBP format
                $savedPath = $destinationPath . '/' . $imageName;
                imagewebp($imageResource, $savedPath);
                imagedestroy($imageResource);

                // Correctly formatted relative path for storage link
                $relativeImagePath = "storage/$folder/$imageName";
                $images[] = $relativeImagePath;
            }
        }

        return $images;
    }

    /**
     * Handle uploaded image files and convert them to WEBP.
     */
    private function handleUploadedImages($uploadedFiles, $folder, $existingImages = [])
    {
        // Initialize with existing images if any
        $images = !empty($existingImages) ? $existingImages : [];

        if ($uploadedFiles) {
            foreach ($uploadedFiles as $file) {
                // Generate a unique name for each image
                $imageName = time() . '-' . Str::uuid() . '.webp';
                // Correct destination path for storage
                $destinationPath = storage_path("app/public/$folder");

                // Create the directory if it does not exist
                if (!File::exists($destinationPath)) {
                    File::makeDirectory($destinationPath, 0755, true, true);
                }

                // Convert the uploaded image to WEBP format
                $imageResource = imagecreatefromstring(file_get_contents($file));
                $savedPath = $destinationPath . '/' . $imageName;
                imagewebp($imageResource, $savedPath);
                imagedestroy($imageResource);

                // Correctly formatted relative path for storage link
                $relativeImagePath = "storage/$folder/$imageName";
                $images[] = $relativeImagePath;
            }
        }

        return $images;
    }

    /**
     * Remove the specified property from storage.
     */
    public function destroy(Property $property)
    {
        // Delete main images
        $this->deleteImages(json_decode($property->main_image, true), 'property/');

        // Delete other images
        $this->deleteImages(json_decode($property->other_images, true), 'property/other_images/');

        // Delete the property from the database
        $property->delete();

        return redirect()->route('admin.property.index')->with('success', 'Property deleted successfully.');
    }

    /**
     * Deletes images from the specified path.
     *
     * @param array|string|null $images
     * @param string $folderPath
     */
    private function deleteImages($images, $folderPath)
    {
        // If $images is a string, convert it to an array
        if (is_string($images)) {
            $images = [$images];
        }

        // If $images is an array, iterate through each image
        if (is_array($images)) {
            foreach ($images as $image) {
                // Check if image is not empty
                if (!empty($image)) {
                    // Extract the basename of the image path
                    $imagePath = storage_path('app/public/' . $folderPath . basename($image));

                    // Check if the image exists and delete it
                    if (file_exists($imagePath)) {
                        unlink($imagePath);
                    }
=======
        return redirect()->route('property.index');
    }

    /**
     * Remove the specified property from storage.
     */
    public function destroy(Property $property)
    {
        // Delete main images
        $this->deleteImages(json_decode($property->main_image, true));

        // Delete other images
        $this->deleteImages(json_decode($property->other_images, true));

        $property->delete();

        return redirect()->route('property.index')->with('success', 'Property deleted successfully.');
    }

    /**
 * Handle base64 image uploads and conversions to WEBP.
 */
private function handleBase64Images(array $base64Images, $folder, $existingImages = [])
{
    // Initialize with existing images if provided
    $images = !empty($existingImages) ? json_decode($existingImages, true) : [];

    foreach ($base64Images as $base64Image) {
        // Extract base64 encoded part and decode it
        $image = explode(',', $base64Image);
        $decodedImage = base64_decode($image[1]);
        $imageResource = imagecreatefromstring($decodedImage);

        if ($imageResource !== false) {
            // Generate unique image name
            $imageName = time() . '-' . Str::uuid() . '.webp';
            // Correct destination path
            $destinationPath = storage_path("app/public/$folder");

            // Create the directory if it does not exist
            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true, true);
            }

            // Save the image in WEBP format
            $savedPath = $destinationPath . '/' . $imageName;
            imagewebp($imageResource, $savedPath);
            imagedestroy($imageResource);

            // Correctly formatted relative path for storage link
            $relativeImagePath = "storage/$folder/$imageName";
            $images[] = $relativeImagePath;
        }
    }

    return $images;
}


   /**.
 * Handle uploaded image files and convert them to WEBP.
 */
private function handleUploadedImages($uploadedFiles, $folder, $existingImages = [])
{
    // Initialize with existing images if any
    $images = !empty($existingImages) ? json_decode($existingImages, true) : [];

    if ($uploadedFiles) {
        foreach ($uploadedFiles as $file) {
            // Generate a unique name for each image
            $imageName = time() . '-' . Str::uuid() . '.webp';
            // Correct destination path for storage
            $destinationPath = storage_path("app/public/$folder");

            // Create the directory if it does not exist
            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true, true);
            }

            // Convert the uploaded image to WEBP format
            $imageResource = imagecreatefromstring(file_get_contents($file));
            $savedPath = $destinationPath . '/' . $imageName;
            imagewebp($imageResource, $savedPath);
            imagedestroy($imageResource);

            // Correctly formatted relative path for storage link
            $relativeImagePath = "storage/$folder/$imageName";
            $images[] = $relativeImagePath;
        }
    }

    return $images;
}


    /**
     * Delete images from storage.
     */
    private function deleteImages($images)
    {
        if ($images) {
            foreach ($images as $image) {
                $filePath = storage_path('app/' . $image);
                if (file_exists($filePath)) {
                    unlink($filePath);
>>>>>>> bc57c5079346bc38c5f5131b83ef638abb3e899e
                }
            }
        }
    }

<<<<<<< HEAD
    /**
     * Update images for the specified property.
     */
    public function updateImages(Request $request,  $id)
    {
        $request->validate([
            'main_image.*' => 'nullable|file|mimes:jpg,jpeg,png,webp|max:2048',
            'other_images.*' => 'nullable|file|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $property = Property::findOrFail($id);

        if ($request->has('main_image_base64')) {
            $mainImageData = $request->input('main_image_base64');
    
            // Remove the data:image part and decode the image
            $mainImage = str_replace('data:image/jpeg;base64,', '', $mainImageData);
            $mainImage = base64_decode($mainImage);
    
            // Save the image to the desired location
            $mainImagePath = '' . time() . '.webp';
            file_put_contents(public_path($mainImagePath), $mainImage);
        }    

        // Handle other images update
        if ($request->hasFile('other_images')) {
            // Delete existing other images
            $this->deleteImages(json_decode($property->other_images, true), 'property/other_images/');

            // Handle new other images
            $otherImages = $this->handleUploadedImages($request->file('other_images'), 'property/other_images');
            $property->update(['other_images' => json_encode($otherImages)]);
        }

        session()->flash('success', 'Images updated successfully.');

        return redirect()->back();
    }
}
=======
    public function getSubcategories($categoryId)
{
    $subcategories = SubCategory::where('category_id', $categoryId)->get();
    return response()->json($subcategories);
}
}   
>>>>>>> bc57c5079346bc38c5f5131b83ef638abb3e899e
