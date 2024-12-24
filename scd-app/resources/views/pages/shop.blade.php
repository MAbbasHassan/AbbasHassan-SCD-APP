<x-master-layout>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        .shop-container {
            max-width: 1200px;
            margin: 2rem auto;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            gap: 2rem;
        }

        .card {
            width: 250px;
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 1s forwards;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .card img {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }

        .card-body {
            padding: 1rem;
            text-align: center;
        }

        .card-body h5 {
            font-size: 1.2rem;
            margin: 0.5rem 0;
        }

        .card-body p {
            color: #6c757d;
            font-size: 0.9rem;
        }

        .btn {
            display: inline-block;
            padding: 0.5rem 1rem;
            margin-top: 1rem;
            font-size: 0.9rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-cart {
            background-color: #28a745;
            color: white;
        }

        .btn-cart:hover {
            background-color: #218838;
        }
    </style>

    <div class="shop-container">
        @foreach ($products as $product)
            <div class="card">
                <img src="{{ asset('storage/uploads/'.$product->picture) }}" alt="{{ $product->name }}">
                <div class="card-body">
                    <h5>{{ $product->name }}</h5>
                    <p>${{ number_format($product->price, 2) }}</p>
                    <form action="{{ route('cart.add', $product->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-cart">Add to Cart</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</x-master-layout>
