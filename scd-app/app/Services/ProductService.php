<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductService
{
    // Get all products
    public function getAllProducts()
    {
        return Product::all(); // Or any custom query
    }

    // Get product by ID
    public function getProductById($id)
    {
        return Product::find($id); // Or use findOrFail() for automatic exception handling
    }

    // Validate product data
    public function validateProductData(Request $request, $update = false)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'file' => 'required|image|mimes:jpg,png,jpeg,gif,jfif,webp|max:2048', // Add image validation
        ];

        // Modify the validation rules for updating a product (image is optional in update)
        if ($update) {
            $rules['file'] = 'nullable|image|mimes:jpg,png,jpeg,gif,jfif,webp|max:2048';
        }

        return $request->validate($rules);
    }

    // Create a product
    public function createProduct($validatedData)
    {
        // Handle the image upload
        if (isset($validatedData['file'])) {
            $filePath = $validatedData['file']->store('uploads', 'public'); // Store the image
            $validatedData['picture'] = $filePath; // Save image path in the 'picture' field
        }

        // Create and return the product
        return Product::create($validatedData);
    }

    // Update a product
    public function updateProduct($id, $validatedData)
    {
        $product = Product::find($id);

        // If there is a new image file
        if (isset($validatedData['file'])) {
            // Delete old image if exists
            if ($product->picture) {
                Storage::delete('public/' . $product->picture);
            }
            // Store new image
            $filePath = $validatedData['file']->store('uploads', 'public');
            $validatedData['picture'] = $filePath; // Save new image path
        }

        $product->update($validatedData); // Update the product
        return $product;
    }

    // Delete a product
    public function deleteProduct($id)
    {
        $product = Product::find($id);

        // Delete the associated image if exists
        if ($product->picture) {
            Storage::delete('public/' . $product->picture);
        }

        // Delete the product record
        $product->delete();
    }
}
