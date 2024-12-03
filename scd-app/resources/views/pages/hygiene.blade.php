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

<body>
<div class="bg-blur">
<div class="container mt-5">
<h2 class="text-center mb-4"><strong>Personal Care & Hygiene</strong></h2>
<div class="row">

    <div class="col-md-4 mb-4">
        <div class="card product-card text-center">
            <img src="./images./wash.webp" class="card-img-top product-img" alt="Natural Body Wash">
            <div class="card-body">
                <h5 class="card-title">Natural Body Wash</h5>
                <p class="card-text">Gentle body wash with essential oils, perfect for sensitive skin.</p>
                <p><strong>$9.99</strong></p>
                <button class="btn btn-cart">Add to Cart</button>
            </div>
        </div>
    </div>
   
    <div class="col-md-4 mb-4">
        <div class="card product-card text-center">
            <img src="./images./shampoo.jpg" class="card-img-top product-img" alt="Organic Shampoo">
            <div class="card-body">
                <h5 class="card-title">Organic Shampoo</h5>
                <p class="card-text">Revitalize your hair with a sulfate-free shampoo made from organic ingredients.</p>
                <p><strong>$12.99</strong></p>
                <button class="btn btn-cart">Add to Cart</button>
            </div>
        </div>
    </div>
  
    <div class="col-md-4 mb-4">
        <div class="card product-card text-center">
            <img src="./images./soap.jfif" class="card-img-top product-img" alt="Organic Hand Soap">
            <div class="card-body">
                <h5 class="card-title">Organic Hand Soap</h5>
                <p class="card-text">Cleanse your hands naturally with our organic hand soap.</p>
                <p><strong>$4.99</strong></p>
                <button class="btn btn-cart">Add to Cart</button>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</x-master-layout>
