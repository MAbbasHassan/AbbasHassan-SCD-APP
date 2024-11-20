<x-master-layout>
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
<div class="bg-blur">
<div class="container mt-5">
<h2 class="text-center mb-4"><strong>Baby & Kids</strong></h2>
<div class="row">
   
    <div class="col-md-4 mb-4">
        <div class="card product-card text-center">
            <img src="./images./bb_food.jpg" class="card-img-top product-img" alt="Organic Baby Food">
            <div class="card-body">
                <h5 class="card-title">Organic Baby Food</h5>
                <p class="card-text">Pure and nutritious baby food made from organic fruits and vegetables.</p>
                <p><strong>$8.99</strong></p>
                <button class="btn btn-cart">Add to Cart</button>
            </div>
        </div>
    </div>
   
    <div class="col-md-4 mb-4">
        <div class="card product-card text-center">
            <img src="./images./diaper.webp" class="card-img-top product-img" alt="Eco-friendly Diapers">
            <div class="card-body">
                <h5 class="card-title">Eco-friendly Diapers</h5>
                <p class="card-text">Sustainable and safe diapers made with eco-friendly materials.</p>
                <p><strong>$24.99</strong></p>
                <button class="btn btn-cart">Add to Cart</button>
            </div>
        </div>
    </div>
    
    <div class="col-md-4 mb-4">
        <div class="card product-card text-center">
            <img src="./images./bb_blanket.jpg" class="card-img-top product-img" alt="Organic Baby Blanket">
            <div class="card-body">
                <h5 class="card-title">Organic Baby Blanket</h5>
                <p class="card-text">Warm and soft baby blanket made from 100% organic cotton.</p>
                <p><strong>$18.99</strong></p>
                <button class="btn btn-cart">Add to Cart</button>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</x-master-layout>
