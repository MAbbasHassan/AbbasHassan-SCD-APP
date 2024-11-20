<x-master-layout>
    <title>Home & Cleaning | True Organic Hub</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            color: #333;
            background-image:url("{{asset("./images./food.webp")}}") ;
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
            color: white;
            transition: background-color 0.3s, transform 0.3s;
        }
        .btn-cart:hover {
            background-color: #556b2f;
            transform: scale(1.05);
        }
        .bg-blur{
		backdrop-filter:blur(5px);
		height:100%;
		width:100%;
		}
    </style>
</head>
<body>
    <div class = bg-blur>
<div class="container mt-5">
    <h2 class="text-center mb-4"><strong>Home & Cleaning Supplies</strong></h2>
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card product-card text-center">
                <img src="{{asset("./images./dish.jpeg")}}" class="card-img-top product-img" alt="Organic Dish Soap">
                <div class="card-body">
                    <h5 class="card-title">Organic Dish Soap</h5>
                    <p class="card-text">Eco-friendly dish soap with natural ingredients for a powerful clean.</p>
                    <p><strong>$5.99</strong></p>
                    <button class="btn btn-cart">Add to Cart</button>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card product-card text-center">
                <img src="{{asset("./images./laundry.jfif")}}"class="card-img-top product-img" alt="Organic Laundry Detergent">
                <div class="card-body">
                    <h5 class="card-title">Organic Laundry Detergent</h5>
                    <p class="card-text">Gentle yet effective detergent that’s safe for sensitive skin and the environment.</p>
                    <p><strong>$12.99</strong></p>
                    <button class="btn btn-cart">Add to Cart</button>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card product-card text-center">
                <img src="{{asset("./images./air.jpg")}}" class="card-img-top product-img" alt="Natural Air Freshener">
                <div class="card-body">
                    <h5 class="card-title">Natural Air Freshener</h5>
                    <p class="card-text">Freshen up any room with this eco-friendly, non-toxic air freshener.</p>
                    <p><strong>$4.99</strong></p>
                    <button class="btn btn-cart">Add to Cart</button>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>
</body>
</x-master-layout>