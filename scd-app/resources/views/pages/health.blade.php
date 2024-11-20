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
<h2 class="text-center mb-4"><strong>Health & Wellness</strong></h2>
<div class="row">
    
    <div class="col-md-4 mb-4">
        <div class="card product-card text-center">
            <img src="./images./tea.jpg" class="card-img-top product-img" alt="Herbal Tea">
            <div class="card-body">
                <h5 class="card-title">Organic Herbal Tea</h5>
                <p class="card-text">A soothing blend of organic herbs to boost immunity and relaxation.</p>
                <p><strong>$12.99</strong></p>
                <button class="btn btn-cart">Add to Cart</button>
            </div>
        </div>
    </div>
    
    <div class="col-md-4 mb-4">
        <div class="card product-card text-center">
            <img src="./images./supplements.jpg" class="card-img-top product-img" alt="Vitamin Supplements">
            <div class="card-body">
                <h5 class="card-title">Vitamin Supplements</h5>
                <p class="card-text">Essential vitamins and minerals for daily health and wellness.</p>
                <p><strong>$19.99</strong></p>
                <button class="btn btn-cart">Add to Cart</button>
            </div>
        </div>
    </div>
   
    <div class="col-md-4 mb-4">
        <div class="card product-card text-center">
            <img src="./images./protien.jfif" class="card-img-top product-img" alt="Organic Protein Powder">
            <div class="card-body">
                <h5 class="card-title">Organic Protein Powder</h5>
                <p class="card-text">Plant-based protein powder for muscle recovery and energy.</p>
                <p><strong>$29.99</strong></p>
                <button class="btn btn-cart">Add to Cart</button>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</x-master-layout>