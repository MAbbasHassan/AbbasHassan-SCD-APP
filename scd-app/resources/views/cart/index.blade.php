<x-master-layout>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            color: #4a4a4a;
            background-image: url("{{ asset('./images./food.webp') }}");
            background-size: cover;
        }

        .cart-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .cart-table th, .cart-table td {
            padding: 15px;
            text-align: center;
            border: 1px solid #ddd;
            vertical-align: middle;
        }

        .cart-table th {
            background-color: #f8f9fa;
            font-weight: bold;
        }

        /* Redesigned image styles */
        .cart-item img {
            width: 100px; /* Fixed width */
            height: 100px; /* Fixed height */
            object-fit: cover;
            border-radius: 10px;
            display: block;
            margin: 0 auto;
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

        .btn-warning {
            background-color: #ffc107;
            color: black;
        }

        .btn-warning:hover {
            background-color: #e0a800;
        }

        .bg-blur {
            backdrop-filter: blur(5px);
            height: 100%;
            width: 100%;
        }

        .total {
            font-size: 18px;
            font-weight: bold;
            margin-top: 20px;
            text-align: right;
        }

        .actions {
            margin-top: 20px;
        }

        .actions a {
            margin-top: 20px;
            display: inline-block;
        }

        /* Redesigned Quantity Buttons */
        .quantity-buttons {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .quantity-buttons button {
            padding: 8px;
            font-size: 18px;
            background-color: #f0f0f0;
            border: 1px solid #ddd;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .quantity-buttons button:hover {
            background-color: #e0e0e0;
        }

        .quantity-buttons span {
            margin: 0 10px;
            font-weight: bold;
        }

        /* Style for Remove Button */
        .btn-danger {
            background-color: #dc3545;
            color: white;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }
    </style>

<body>
    <div class="bg-blur">
        <div class="container mt-5">
            <h1 class="text-center mb-4">Your Cart</h1>

            <!-- Back to Products Button -->
            <div class="actions">
                <a href="{{ route('user.products') }}" class="btn btn-warning">Add More Products</a>
            </div>

            <!-- Cart Items Table -->
            @if(session()->has('cart') && count(session('cart')) > 0)
                <table class="cart-table">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Product Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Subtotal</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(session('cart') as $productId => $details)
                            <tr>
                                <td><img src="{{ asset('storage/' . $details['image']) }}" alt="{{ $details['name'] }}"></td>
                                <td>{{ $details['name'] }}</td>
                                <td>{{ $details['description'] }}</td>
                                <td>${{ $details['price'] }}</td>
                                <td>
                                    <div class="quantity-buttons">
                                        <form action="{{ route('cart.update', $productId) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" name="action" value="decrease" class="btn btn-secondary">-</button>
                                        </form>
                                        <span>{{ $details['quantity'] }}</span>
                                        <form action="{{ route('cart.update', $productId) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" name="action" value="increase" class="btn btn-secondary">+</button>
                                        </form>
                                    </div>
                                </td>
                                <td>${{ $details['subtotal'] }}</td>
                                <td>
                                    <form action="{{ route('cart.remove', $productId) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Remove</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{-- <div class="total">
                    Total: ${{ array_sum(array_column(session('cart'), 'subtotal')) }}
                </div> --}}
                <form action="{{ route('cart.checkout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-success">Proceed to Checkout</button>
                </form>
            @else
                <p>Your cart is empty!</p>
            @endif
        </div>
    </div>
</body>
</x-master-layout>
