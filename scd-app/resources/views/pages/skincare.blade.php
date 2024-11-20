<x-master-layout>
    <title>Skincare & Beauty | True Organic Hub</title>
<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f8f9fa;
        color: #4a4a4a;
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
        transition: background-color 0.3s, transform 0.3s;
        color: white;
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
    <div class="bg-blur">
<div class="container mt-5">
<h2 class="text-center mb-4"><strong>Skincare & Beauty</strong></h2>
<div class="row">
    <div class="col-md-4 mb-4">
        <div class="card product-card text-center">
            <img src="{{asset("./images./f_cream.jpg")}}" class="card-img-top product-img" alt="Organic Face Cream">
            <div class="card-body">
                <h5 class="card-title">Organic Face Cream</h5>
                <p class="card-text">Nourish your skin with this hydrating, all-natural face cream.</p>
                <p><strong>$18.99</strong></p>
                <button class="btn btn-cart"><a href="./detail">View Details</a></button>
                <button class="btn btn-cart">Add to Cart</button>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card product-card text-center">
            <img src="{{asset("./images./lipbalm.jpg")}}" class="card-img-top product-img" alt="Organic Lip Balm">
            <div class="card-body">
                <h5 class="card-title">Organic Lip Balm</h5>
                <p class="card-text">Keep your lips soft and moisturized with natural ingredients.</p>
                <p><strong>$5.49</strong></p>
                <button class="btn btn-cart"><a href="./detail">View Details</a></button>
                <button class="btn btn-cart">Add to Cart</button>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card product-card text-center">
            <img src="{{asset("./images./lotion.jpg")}}" class="card-img-top product-img" alt="Organic Body Lotion">
            <div class="card-body">
                <h5 class="card-title">Organic Body Lotion</h5>
                <p class="card-text">A lightweight body lotion for smooth, radiant skin.</p>
                <p><strong>$12.99</strong></p>
                <button class="btn btn-cart"><a href="./detail">View Details</a></button>
                <button class="btn btn-cart">Add to Cart</button>
            </div>
        </div>
    </div>
</div>
</div>
    </div>
</body>
</x-master-layout>