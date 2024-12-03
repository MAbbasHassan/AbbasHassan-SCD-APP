{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Organic Products</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
     --}}
     <x-master-layout>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            color: #4a4a4a;
            background-image:url("{{asset("./images./food.webp")}}") ;
            background-size: cover;  
        }
        .btn-admin {
            width: 200px;
            margin: 10px;
            background-color: #6b8e23;
            color: white;
            border: none;
            transition: background-color 0.3s, transform 0.3s;
        }
        .btn-admin:hover {
            background-color: #556b2f;
            transform: scale(1.05);
        }
        .bg-blur{
		backdrop-filter:blur(5px);
		height:100%;
		width:100%;
		}
        .container-page {
            max-width: 800px;
            margin: 2rem auto;
            padding: 8rem;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }
    </style>
<body>
    <div class="bg-blur">
    <!-- Admin Panel Main Page -->
    <div id="mainPanel" class="container mt-5 bg-blur text-center">
        <h1 class="text-center mb-4 h1" style="color:white"><strong>Admin-Panel</strong></h1>
        <button class="btn btn-admin" onclick="openPage('createProductPage')">Create Product</button><br><br><br>
        <button class="btn btn-admin" onclick="openPage('readProductPage')">Read Product</button><br><br><br>
        <button class="btn btn-admin" onclick="openPage('updateProductPage')">Update Product</button><br><br><br>
        <button class="btn btn-admin" onclick="openPage('deleteProductPage')">Delete Product</button><br><br><br>
    </div>

    <!-- Create Product Page -->
    <div id="createProductPage" class="container-page d-none">
        <h1 class="text-center mb-4 h1" style="color:black"><strong>Admin-Panel -- Create Product</strong></h1>
        <form>
            <div class="mb-3">
                <label for="productId" class="form-label">Product ID</label>
                <input type="text" class="form-control" id="productId" required>
            </div>
            <div class="mb-3">
                <label for="productName" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="productName" required>
            </div>
            <div class="mb-3">
                <label for="productPrice" class="form-label">Product Price</label>
                <input type="number" class="form-control" id="productPrice" required>
            </div>
            <div class="mb-3">
                <label for="productImage" class="form-label">Product Image URL</label>
                <input type="text" class="form-control" id="productImage" required>
            </div>
            <div class="mb-3">
                <label for="productCategory" class="form-label">Category</label>
                <select class="form-select" id="productCategory" required>
                    <option value="food">Food</option>
                    <option value="skincare">Skincare</option>
                    <option value="cleaning">Cleaning</option>
                    <option value="baby">Baby</option>
                    <option value="health">Health</option>
                    <option value="personal care">Personal Care</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="productDescription" class="form-label">Description</label>
                <textarea class="form-control" id="productDescription" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-success">Create Product</button>
            <button type="button" class="btn btn-secondary" onclick="goBack()">Go Back</button>
        </form>
    </div>

    <!-- Read Product Page -->
    <div id="readProductPage" class="container-page d-none">
        <h1 class="text-center mb-4 h1" style="color:black"><strong>Admin-Panel -- Read Product</strong></h1>
        <form>
            <div class="mb-3">
                <label for="readProductId" class="form-label">Product ID</label>
                <input type="text" class="form-control" id="readProductId">
            </div>
            <div class="mb-3">
                <label for="readCategory" class="form-label">Category</label>
                <select class="form-select" id="readCategory">
                    <option value="food">Food</option>
                    <option value="skincare">Skincare</option>
                    <option value="cleaning">Cleaning</option>
                    <option value="baby">Baby</option>
                    <option value="health">Health</option>
                    <option value="personal care">Personal Care</option>
                </select>
            </div>
            <button type="button" class="btn btn-info">Read Product</button>
            <button type="button" class="btn btn-secondary" onclick="goBack()">Go Back</button>
        </form>
    </div>

    <!-- Update Product Page -->
    <div id="updateProductPage" class="container-page d-none">
        <h1 class="text-center mb-4 h1" style="color:black"><strong>Admin-Panel -- Update Product</strong></h1>
        <form>
            <div class="mb-3">
                <label for="updateProductId" class="form-label">Product ID</label>
                <input type="text" class="form-control" id="updateProductId" required>
            </div>
            <div class="mb-3">
                <label for="updateProductName" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="updateProductName">
            </div>
            <div class="mb-3">
                <label for="updateCategory" class="form-label">Category</label>
                <select class="form-select" id="updateCategory">
                    <option value="food">Food</option>
                    <option value="skincare">Skincare</option>
                    <option value="cleaning">Cleaning</option>
                    <option value="baby">Baby</option>
                    <option value="health">Health</option>
                    <option value="personal care">Personal Care</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="updatePrice" class="form-label">Product Price</label>
                <input type="number" class="form-control" id="updatePrice">
            </div>
            <div class="mb-3">
                <label for="updateDescription" class="form-label">Description</label>
                <textarea class="form-control" id="updateDescription" rows="3"></textarea>
            </div>
            <button type="button" class="btn btn-primary">Update Product</button>
            <button type="button" class="btn btn-secondary" onclick="goBack()">Go Back</button>
        </form>
    </div>

    <!-- Delete Product Page -->
    <div id="deleteProductPage" class="container-page d-none">
        <h1 class="text-center mb-4 h1" style="color:black"><strong>Admin-Panel -- Delete Product</strong></h1>
        <form>
            <div class="mb-3">
                <label for="deleteProductId" class="form-label">Product ID</label>
                <input type="text" class="form-control" id="deleteProductId" required>
            </div>
            <div class="mb-3">
                <label for="deleteCategory" class="form-label">Category</label>
                <select class="form-select" id="deleteCategory">
                    <option value="food">Food</option>
                    <option value="skincare">Skincare</option>
                    <option value="cleaning">Cleaning</option>
                    <option value="baby">Baby</option>
                    <option value="health">Health</option>
                    <option value="personal care">Personal Care</option>
                </select>
            </div>
            <button type="button" class="btn btn-danger">Delete Product</button>
            <button type="button" class="btn btn-secondary" onclick="goBack()">Go Back</button>
        </form>
    </div>
    </div>

    <!-- JavaScript -->
    <script>
        function openPage(pageId) {
            document.querySelectorAll('.container-page, #mainPanel').forEach(el => el.classList.add('d-none'));
            document.getElementById(pageId).classList.remove('d-none');
        }

        function goBack() {
            document.querySelectorAll('.container-page').forEach(el => el.classList.add('d-none'));
            document.getElementById('mainPanel').classList.remove('d-none');
        }
    </script>
</body>
</x-master-layout>