<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category; // Import the Category model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // View with Search Functionality
    public function show($id)
{
    $product = Product::findOrFail($id); // Fetch the product by ID
    return view('products.show', compact('product')); // Return the product details view
}

    public function view(Request $request)
    {
        $search = $request->input('search'); // Get the search term

        // Query to filter the products
        $products = Product::query()
            ->when($search, function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%');
            })
            ->get();

        // Return the filtered products to the same view
        return view('product.read', compact('products', 'search'));
    }

    // Display All Products
    public function index()
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    // Show the Form to Create a Product
    public function create()
    {
        $categories = Category::all(); // Fetch categories for the dropdown
        return view('product.create', compact('categories'));
    }

    // Show Products with Search Capability
    public function read(Request $request)
    {
        $search = $request->input('search');
        $products = $search
            ? Product::where('name', 'like', "%$search%")
                ->orWhere('description', 'like', "%$search%")
                ->get()
            : Product::all();

        return view('product.read', compact('products', 'search'));
    }

    // Store a New Product
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'file' => 'required|image|mimes:jpg,png,jpeg,gif,jfif,webp|max:2048',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id', // Validate category exists
        ]);

        // Store the image
        $filePath = $request->file('file')->store('uploads', 'public');

        // Create the product
        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'picture' => $filePath,
            'category_id' => $request->category_id,
        ]);

        return redirect()->back()->with('status', 'Product created successfully!');
    }

    // Show the Form to Edit a Product
    public function edit(int $id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all(); // Fetch categories for the dropdown
        return view('product.edit', compact('product', 'categories'));
    }

    // Update an Existing Product
   // Update an Existing Product
public function update(Request $request, $id)
{
    $product = Product::findOrFail($id);

    // Validate the incoming request
    $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'description' => 'required|string',
        'category_id' => 'required|exists:categories,id', // Validate category exists
        'file' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048', // Validate the image file
    ]);

    // Handle the file upload if there is a file
    if ($request->hasFile('file')) {
        if ($product->picture) {
            Storage::delete('public/' . $product->picture); // Delete old image
        }
        // Store the new file and assign its path to the product
        $product->picture = $request->file('file')->store('uploads', 'public');
    }

    // Update other product fields
    $product->update([
        'name' => $request->name,
        'price' => $request->price,
        'description' => $request->description,
        'category_id' => $request->category_id,
    ]);

    return redirect()->back()->with('status', 'Product updated successfully!');
}

    // Delete a Product
    public function destroy(int $id)
    {
        $product = Product::findOrFail($id);

        // Delete the associated image if it exists
        if ($product->picture) {
            Storage::delete('public/' . $product->picture);
        }

        $product->delete();

        return redirect()->back()->with('status', 'Product deleted successfully');
    }

    // User Product Search Functionality
public function userSearch(Request $request)
{
    $search = $request->input('search'); // Get the search term

    // Query products by name or description
    $products = Product::query()
        ->when($search, function ($query) use ($search) {
            $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%');
        })
        ->get();

    // Return the same view with filtered products
    return view('user.products', compact('products', 'search'));
}

}
