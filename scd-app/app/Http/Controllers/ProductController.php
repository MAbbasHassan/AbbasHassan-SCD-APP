<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category; // Import the Category model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Services\ProductService;

class ProductController extends Controller
{

    private $productService;

public function __construct(ProductService $productService)
{
    $this->productService = $productService;
}

    // Display a single product by ID
    public function show($id)
    {
        $product = Product::findOrFail($id); // Fetch the product by ID
        return view('products.show', compact('product')); // Return the product details view
    }

    // View products with search functionality
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

        return view('product.read', compact('products', 'search'));
    }

    // Display all products
    public function index()
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }

     // Show Products with Search Capability
     public function read(Request $request)
     {
         $search = $request->input('search');
         $products = $search
             ? Product::where('name', 'like', "%$search%")
                 ->orWhere('description', 'like', "%$search%")
                 ->get()
             : Product::all(); //data fetch
 
         return view('product.read', compact('products', 'search'));
     } 

    // Show the form to create a product
    public function create()
    {
        $categories = Category::all(); // Fetch categories for the dropdown
        return view('product.create', compact('categories'));
    }

    // Store a new product
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

    // Show the form to edit a product
    public function edit(int $id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all(); // Fetch categories for the dropdown
        return view('product.edit', compact('product', 'categories'));
    }

    // Update an existing product
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id', // Validate category exists
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048', // Validate the image file
        ]);

        if ($request->hasFile('file')) {
            if ($product->picture) {
                Storage::delete('public/' . $product->picture); // Delete old image
            }
            $product->picture = $request->file('file')->store('uploads', 'public');
        }

        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'category_id' => $request->category_id,
        ]);

        return redirect()->back()->with('status', 'Product updated successfully!');
    }

    // Delete a product
    public function destroy(int $id)
    {
        $product = Product::findOrFail($id);

        if ($product->picture) {
            Storage::delete('public/' . $product->picture); // Delete associated image
        }

        $product->delete();

        return redirect()->back()->with('status', 'Product deleted successfully');
    }

    // User product search functionality
    public function userSearch(Request $request)
    {
        $search = $request->input('search'); // Get the search term

        $products = Product::query()
            ->when($search, function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
                  //  ->orWhere('description', 'like', '%' . $search . '%');
            })
            ->get();

        return view('user.products', compact('products', 'search'));
    }

    // General product search functionality (Ajax and non-Ajax)
    public function search(Request $request)
{
    $search = $request->query('search', ''); // Get the search query

    // Filter products based on the search term
    $products = Product::query()
        ->when($search, function ($query) use ($search) {
            $query->where('name', 'like', '%' . $search . '%');
             //   ->orWhere('description', 'like', '%' . $search . '%');
        })
        ->get();

    // Return JSON response for Ajax requests
    if ($request->ajax()) {
        return response()->json($products);
    }

    // Otherwise, return the view for normal requests
    return view('user.products', compact('products', 'search'));
}

}
