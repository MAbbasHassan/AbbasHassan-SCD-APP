<x-master-layout>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            color: #4a4a4a;
            background-image: url("{{ asset('./images/food.webp') }}");
            background-size: cover;
            background-position: center;
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
            max-width: 900px;
            margin: 2rem auto;
            padding: 2rem;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        h1 {
            color: #333;
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 2rem;
        }

        .form-label {
            font-size: 1rem;
            font-weight: bold;
            color: #555;
        }

        .form-control, .form-select {
            border-radius: 5px;
            border: 1px solid #ccc;
            padding: 0.75rem;
            font-size: 1rem;
            width: 100%;
        }

        .form-control:focus, .form-select:focus {
            border-color: #6b8e23;
            box-shadow: 0 0 5px rgba(107, 142, 35, 0.5);
        }

        .btn {
            width: 100%;
            padding: 12px;
            font-size: 1.1rem;
            border-radius: 5px;
        }

        .btn-success {
            background-color: #6b8e23;
            border: none;
            color: white;
        }

        .btn-success:hover {
            background-color: #556b2f;
        }

        .btn-secondary {
            background-color: #6c757d;
            border: none;
            color: white;
            margin-top: 1rem;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }

        .alert {
            margin-bottom: 20px;
        }

        .mb-3 {
            margin-bottom: 1.5rem;
        }

        .text-danger {
            font-size: 0.875rem;
            color: #dc3545;
        }
    </style>

    <body>
        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        <div class="bg-blur">
            <div id="createProductPage" class="container-page">
                <h1 class="text-center mb-4">Admin Panel - Create Product</h1>
                <form action="{{ url('products/create') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Name -->
                    <div class="mb-3">
                        <label class="form-label" for="name">Product Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}"/>
                        @error('name') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>

                    <!-- File Upload -->
                    <div class="mb-3">
                        <label class="form-label" for="file">Product Image</label>
                        <input type="file" name="file" id="file" class="form-control" />
                    </div>

                    <!-- Product Price -->
                    <div class="mb-3">
                        <label class="form-label" for="price">Product Price</label>
                        <input type="number" name="price" id="price" class="form-control" value="{{ old('price') }}" step="0.01"/>
                        @error('price') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>

                    <!-- Category -->
                    <div class="mb-3">
                        <label class="form-label" for="category_id">Category</label>
                        <select name="category_id" id="category_id" class="form-select">
                            <option value="" selected disabled>Select a Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>

                    <!-- Description -->
                    <div class="mb-3">
                        <label class="form-label" for="description">Description</label>
                        <textarea name="description" id="description" class="form-control" rows="3">{{ old('description') }}</textarea>
                        @error('description') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-success">Create Product</button>

                    <!-- Go Back Button -->
                    <a href="{{ url('products') }}" class="btn btn-secondary">Go Back</a>
                </form>
            </div>
        </div>
    </body>
</x-master-layout>
