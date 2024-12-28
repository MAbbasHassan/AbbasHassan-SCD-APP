<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException; // For better exception handling

class ProductApiController extends Controller
{
    private $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    // Get all products
    public function index()
    {
        try {
            $products = $this->productService->getAllProducts();
            return response()->json($products, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500); // Handle server errors
        }
    }

    // Get a single product by ID
    public function show($id)
    {
        try {
            $product = $this->productService->getProductById($id);

            if (!$product) {
                return response()->json(['error' => 'Product not found'], 404);
            }

            return response()->json($product, 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Product not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500); // Handle other errors
        }
    }

    // Create a new product
    public function store(Request $request)
    {
        try {
            $validated = $this->productService->validateProductData($request);

            // Ensure this returns the validated data, e.g., an array
            $product = $this->productService->createProduct($validated);

            return response()->json(['message' => 'Product created successfully', 'data' => $product], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400); // Client-side errors
        }
    }

    // Update an existing product
    public function update(Request $request, $id)
    {
        try {
            $product = $this->productService->getProductById($id);

            if (!$product) {
                return response()->json(['error' => 'Product not found'], 404);
            }

            $validated = $this->productService->validateProductData($request, true); // Validate update data
            $updatedProduct = $this->productService->updateProduct($id, $validated);

            return response()->json(['message' => 'Product updated successfully', 'data' => $updatedProduct], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Product not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400); // Handle validation errors
        }
    }

    // Delete a product
    public function destroy($id)
    {
        try {
            $product = $this->productService->getProductById($id);

            if (!$product) {
                return response()->json(['error' => 'Product not found'], 404);
            }

            $this->productService->deleteProduct($id);

            return response()->json(['message' => 'Product deleted successfully'], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Product not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500); // Handle server-side errors
        }
    }
}
