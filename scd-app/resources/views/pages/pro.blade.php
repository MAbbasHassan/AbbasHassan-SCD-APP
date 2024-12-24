<x-master-layout>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            color: #4a4a4a;
            background-image: url("{{ asset('./images/background.webp') }}");
            background-size: cover;
        }

        .search-container {
            margin-bottom: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .search-container input {
            width: 300px;
            padding: 12px;
            margin-right: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
        }

        .search-container button {
            padding: 12px 20px;
            background-color: #007bff;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        .search-container button:hover {
            background-color: #0056b3;
        }

        .product-card {
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            margin: 10px;
            text-align: center;
            background-color: white;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .product-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
        }

        .product-card h5 {
            margin-top: 15px;
            font-size: 18px;
            color: #333;
        }

        .product-card p {
            font-size: 14px;
            color: #666;
        }

        .product-card .btn {
            margin-top: 10px;
            padding: 10px 20px;
            font-size: 14px;
            color: white;
            background-color: #28a745;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .product-card .btn:hover {
            background-color: #218838;
        }
    </style>

    <body>
        <div class="container mt-5">
            <h1 class="text-center mb-4">Products</h1>

            <!-- Search Form -->
            <div class="search-container">
                <form action="{{ route('user.products') }}" method="GET" class="d-flex">
                    <input type="search" name="search" class="form-control" placeholder="Search for products..." value="{{ $search ?? '' }}">
                    <button class="btn btn-primary">Search</button>
                </form>
            </div>

            <!-- Products Grid -->
            <div class="row">
                @if($products->isEmpty())
                    <div class="col-12 text-center">
                        <p>No products found.</p>
                    </div>
                @else
                    @foreach ($products as $product)
                        <div class="col-md-4">
                            <div class="product-card">
                                <img src="{{ asset('storage/' . $product->picture) }}" alt="{{ $product->name }}">
                                <h5>{{ $product->name }}</h5>
                                <p>{{ Str::limit($product->description, 100) }}</p>
                                <p><strong>Price:</strong> ${{ $product->price }}</p>
                                <a href="{{ url('products/' . $product->id) }}" class="btn">View Details</a>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </body>
</x-master-layout>
