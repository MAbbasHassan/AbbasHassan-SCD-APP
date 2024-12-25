<x-master-layout>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            color: #4a4a4a;
            background-image: url("{{ asset('./images/food.webp') }}");
            background-size: cover;
            padding: 0;
            margin: 0;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 2rem;
            font-size: 2.5rem;
            font-weight: bold;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
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

        .bg-blur {
            backdrop-filter: blur(5px);
            height: 100%;
            width: 100%;
        }

        .container-page {
            max-width: 800px;
            margin: 2rem auto;
            padding: 3rem;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        .form-control, .form-select {
            border-radius: 5px;
            border: 1px solid #ccc;
            padding: 10px;
            width: 100%;
            margin-bottom: 1rem;
        }

        .form-label {
            font-weight: bold;
        }

        .mb-3 {
            margin-bottom: 1.5rem;
        }

        .btn-success {
            background-color: #28a745;
            color: white;
            padding: 12px 30px;
            border-radius: 5px;
            margin-top: 1rem;
            font-size: 16px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        .btn-secondary {
            background-color: #6c757d;
            color: white;
            padding: 12px 30px;
            border-radius: 5px;
            font-size: 16px;
            margin-top: 1rem;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }

        .alert {
            margin-top: 20px;
            padding: 1rem;
            border-radius: 5px;
            background-color: #d4edda;
            color: #155724;
        }

        .image-thumbnail {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 5px;
        }

        .error {
            color: red;
            font-size: 14px;
        }
    </style>

    <body>
        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        <div class="bg-blur">
            <div id="createProductPage" class="container-page">
                <h1><strong>Admin Panel - Update Product</strong></h1>
                <form action="{{ url('products/'.$product->id.'/edit') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Name Field -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $product->name) }}">
                        @error('name') <div class="error">{{ $message }}</div> @enderror
                    </div>

                    <!-- Price Field -->
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="text" name="price" id="price" class="form-control" value="{{ old('price', $product->price) }}">
                        @error('price') <div class="error">{{ $message }}</div> @enderror
                    </div>

                    <!-- Category Field -->
                    <div class="mb-3">
                        <label for="category_id" class="form-label">Category</label>
                        <select name="category_id" id="category_id" class="form-select">
                            <option value="" disabled>Select a Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id') <div class="error">{{ $message }}</div> @enderror
                    </div>

                    <!-- Image Upload -->
                    <div class="mb-3">
                        <label for="file" class="form-label">Product Image</label>
                        <input type="file" name="file" id="file" class="form-control">
                        @if ($product->picture)
                            <div class="mt-2">
                                <p>Current Image:</p>
                                <img src="{{ asset('storage/'.$product->picture) }}" alt="Product Image" class="image-thumbnail">
                            </div>
                        @endif
                        @error('file') <div class="error">{{ $message }}</div> @enderror
                    </div>

                    <!-- Description Field -->
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" class="form-control" rows="3">{{ old('description', $product->description) }}</textarea>
                        @error('description') <div class="error">{{ $message }}</div> @enderror
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn-success">Update Product</button>

                    <!-- Go Back Button -->
                    <a href="{{ url('products') }}" class="btn-secondary">Go Back</a>
                </form>
            </div>
        </div>
    </body>
</x-master-layout>
