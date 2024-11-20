<x-master-layout>
    
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            color: #4a4a4a;
            background-image:url("{{asset('./images/food.webp')}}");
            background-size: cover;
        }
        .product-card {
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }
        .product-img {
            height: 200px;
            object-fit: cover;
        }
        .btn-cart {
            background-color: #6b8e23;
            border: none;
            transition: background-color 0.3s, transform 0.3s;
            color: white;
        }
        .btn-cart:hover {
            background-color: #556b2f;
            transform: scale(1.05);
        }
        .bg-blur {
            backdrop-filter: blur(5px);
            height: 100%;
            width: 100%;
        }
    </style>
</head>
<body>
<div class="bg-blur">
    <div class="container mt-5">
        <h2 class="text-center mb-4"><strong>Food & Groceries</strong></h2>
        <div class="row">

            <div class="col-md-4 mb-4">
                <div class="card product-card text-center" data-bs-toggle="modal" data-bs-target="#product1Modal">
                    <img src="{{asset('./images/apple.jpg')}}" class="card-img-top product-img" alt="Organic Apples">
                    <div class="card-body">
                        <h5 class="card-title">Organic Apples</h5>
                        <p class="card-text">Fresh, crispy, and organically grown apples.</p>
                        <p><strong>$50.99 / kg</strong></p>
                        <button class="btn btn-cart"><a href="./detail">View Details</a></button>
                        <button class="btn btn-cart">Add to Cart</button>
                    </div>
                </div>
            </div>
        
            <div class="col-md-4 mb-4">
                <div class="card product-card text-center" data-bs-toggle="modal" data-bs-target="#product2Modal">
                    <img src="{{asset('./images/banana.jpg')}}" class="card-img-top product-img" alt="Organic Bananas">
                    <div class="card-body">
                        <h5 class="card-title">Organic Bananas</h5>
                        <p class="card-text">Sweet and nutritious organic bananas.</p>
                        <p><strong>$11.49 / kg</strong></p>
                        <button class="btn btn-cart"><a href="./detail">View Details</a></button>
                        <button class="btn btn-cart">Add to Cart</button>
                    </div>
                </div>
            </div>
        
            <div class="col-md-4 mb-4">
                <div class="card product-card text-center" data-bs-toggle="modal" data-bs-target="#product3Modal">
                    <img src="{{asset('./images/spinach.jpg')}}" class="card-img-top product-img" alt="Organic Spinach">
                    <div class="card-body">
                        <h5 class="card-title">Organic Spinach</h5>
                        <p class="card-text">Fresh, nutrient-rich organic spinach leaves.</p>
                        <p><strong>$30.99 / bunch</strong></p>
                        <button class="btn btn-cart"><a href="./detail">View Details</a></button>
                        <button class="btn btn-cart">Add to Cart</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <!-- Modals for each product -->
    <!-- Product 1 Modal -->
    <div class="modal" id="product1Modal" tabindex="-1" aria-labelledby="product1ModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="product1ModalLabel">Organic Apples</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p style="color: white">Organic apples are not only delicious but also packed with vitamins and minerals. They are perfect for snacking, baking, or adding to salads. Our apples are sourced from certified organic farms and are free from harmful pesticides and chemicals.</p>
                    <p><strong>Price: $50.99 / kg</strong></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-cart">Add to Cart</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Product 2 Modal -->
    <div class="modal" id="product2Modal" tabindex="-1" aria-labelledby="product2ModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="product2ModalLabel">Organic Bananas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Our organic bananas are a great source of potassium and other essential nutrients. They are naturally sweet and make a perfect snack or addition to smoothies and baking. Enjoy the rich flavor and health benefits of these wholesome bananas!</p>
                    <p><strong>Price: $11.49 / kg</strong></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-cart">Add to Cart</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Product 3 Modal -->
    <div class="modal" id="product3Modal" tabindex="-1" aria-labelledby="product3ModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="product3ModalLabel">Organic Spinach</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Organic spinach is known for its rich nutrient content and health benefits. It's perfect for salads, smoothies, and cooking. Our spinach is fresh and grown without any synthetic fertilizers or pesticides, ensuring that you get the best quality.</p>
                    <p><strong>Price: $30.99 / bunch</strong></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-cart">Add to Cart</button>
                </div>
            </div>
        </div>
    </div> --}}
</div>
</body>
</x-master-layout>
