<x-master-layout>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            color: #4a4a4a;
            background-image: url("{{ asset('./images./food.webp') }}");
            background-size: cover;
        }

        .product-card {
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 15px;
            text-align: center;
            background-color: #fff;
            margin-bottom: 20px;
            height: 350px; /* Ensuring all cards have the same height */
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
        }

        .product-card img {
            max-width: 100%;
            max-height: 150px;
            border-radius: 10px;
            object-fit: cover;
            margin-bottom: 15px;
        }

        .btn {
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            font-size: 14px;
            margin: 5px;
        }

        .btn-primary {
            background-color: #007bff;
            color: white;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-success {
            background-color: #28a745;
            color: white;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        .btn-warning {
            background-color: #ffc107;
            color: black;
        }

        .btn-warning:hover {
            background-color: #e0a800;
        }

        .search-bar {
            margin-bottom: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
        }

        .search-bar input {
            height: 38px;
        }

        .actions {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }

        .bg-blur {
            backdrop-filter: blur(5px);
            height: 100%;
            width: 100%;
        }
    </style>

    <body>
        <div class="bg-blur">
            <div class="container mt-5">
                <h1 class="text-center mb-4">All Products</h1>

                <!-- Search Bar -->
                <div class="search-bar">
                    <form method="GET" action="{{ route('user.products') }}" style="display: flex; gap: 10px;">
                        <input type="text" name="search" value="{{ old('search', $search) }}" placeholder="Search for products" class="form-control" style="width: 300px;">
                        <button type="submit" class="btn btn-primary">Search</button>
                        <a href="{{ route('user.products') }}" class="btn btn-secondary">Clear Search</a>
                    </form>
                </div>

                <!-- Actions (Back and View Cart) -->
                <div class="actions">
                    <a href="{{ route('home') }}" class="btn btn-warning">Back to Home</a>
                    <a href="{{ route('cart.index') }}" class="btn btn-primary">View Cart</a>
                </div>

                <!-- Products List -->
                <div class="row mt-4">
                    @foreach ($products as $product)
                        <div class="col-md-4">
                            <div class="product-card">
                                <img src="{{ asset('storage/' . $product->picture) }}" alt="{{ $product->name }}">
                                <h5>{{ $product->name }}</h5>
                                <p>{{ $product->description }}</p>
                                <p><strong>${{ $product->price }}</strong></p>
                                <div>
                                    <a href="{{ route('product.details', $product->id) }}" class="btn btn-primary">View Details</a>
                                    
                                    <!-- Buy Now Button -->
                                    <form action="{{ route('cart.add', $product->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-success">Buy Now</button>
                                    </form>

                                    {{-- <!-- Plus and Minus Buttons -->
                                    <form action="{{ route('cart.update', $product->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        <button type="submit" name="action" value="decrease" class="btn btn-secondary">-</button>
                                        <button type="submit" name="action" value="increase" class="btn btn-secondary">+</button>
                                    </form> --}}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </body>
</x-master-layout>
