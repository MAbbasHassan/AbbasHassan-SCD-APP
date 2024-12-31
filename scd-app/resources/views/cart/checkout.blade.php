<x-master-layout>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }

        .container {
            width: 90%;
            margin: 0 auto;
            padding-top: 50px;
        }

        .checkout-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .checkout-header h1 {
            font-size: 28px;
            color: #333;
        }

        .checkout-section {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .checkout-left,
        .checkout-right {
            width: 48%;
        }

        .checkout-right {
            padding: 20px;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .checkout-left table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            margin-bottom: 30px;
        }

        .checkout-left th,
        .checkout-left td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .checkout-left th {
            background-color: #f7f7f7;
        }

        .product-image {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 10px;
        }

        .checkout-right .total-price {
            font-size: 20px;
            font-weight: bold;
            text-align: right;
            margin-bottom: 20px;
        }

        .checkout-right .btn {
            width: 100%;
            padding: 12px;
            background-color: #28a745;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .checkout-right .btn:hover {
            background-color: #218838;
        }

        .checkout-right .order-summary {
            margin-top: 20px;
        }

        .checkout-right .order-summary h4 {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .checkout-right .order-summary p {
            margin: 5px 0;
            font-size: 14px;
        }

        .checkout-form {
            margin-top: 20px;
        }

        .checkout-form input[type="text"],
        .checkout-form input[type="email"],
        .checkout-form input[type="tel"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
            font-size: 14px;
        }

        .checkout-form label {
            font-weight: bold;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .checkout-section {
                flex-direction: column;
            }

            .checkout-left,
            .checkout-right {
                width: 100%;
            }
        }
    </style>

    <div class="container">
        <div class="checkout-header">
            <h1>Checkout</h1>
            <p>Review your items and complete your order</p>
        </div>

        <div class="checkout-section">
            <!-- Left Column (Cart Items) -->
            <div class="checkout-left">
                <table>
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cart as $productId => $details)
                            <tr>
                                <td>
                                    <img src="{{ asset('storage/' . $details['image']) }}" alt="{{ $details['name'] }}" class="product-image">
                                    <span>{{ $details['name'] }}</span>
                                </td>
                                <td>${{ $details['price'] }}</td>
                                <td>{{ $details['quantity'] }}</td>
                                <td>${{ $details['subtotal'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="total-price">
                    <span>Total: ${{ array_sum(array_column($cart, 'subtotal')) }}</span>
                </div>
            </div>

            <!-- Right Column (Checkout Form) -->
            <div class="checkout-right">
                <div class="order-summary">
                    <h4>Order Summary</h4>
                    <p><strong>Total Items:</strong> {{ count($cart) }}</p>
                    <p><strong>Total Price:</strong> ${{ array_sum(array_column($cart, 'subtotal')) }}</p>
                </div>

                <form action="{{ route('cart.completeCheckout') }}" method="POST" class="checkout-form">
                    @csrf
                    <label for="full-name">Full Name</label>
                    <input type="text" id="full-name" name="full_name" required>

                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" required>

                    <label for="phone">Phone Number</label>
                    <input type="tel" id="phone" name="phone" required>

                    <label for="address">Shipping Address</label>
                    <input type="text" id="address" name="address" required>

                    <button type="submit" class="btn">Complete Purchase</button>
                </form>
            </div>
        </div>
    </div>
</x-master-layout>
