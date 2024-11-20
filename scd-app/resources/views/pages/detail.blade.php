<x-master-layout>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-image: url("{{asset('./images/food.webp')}}");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            color: #4a4a4a;
            position: relative;
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
        .carousel-item img {
            object-fit: cover;
            height: 500px;
        }
        p{
            font-weight:bolder;
        }
    </style>

    <div class="bg-blur">
        <div class="container">
            <div class="h1 text-center mb-5 col-12 text-white pt-5"><strong>Organic Apples - Product Detail</strong></div>

            <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{asset('./images/apple1.webp')}}" class="d-block w-100" alt="Apple Image 1">
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('./images/apple.jpg')}}" class="d-block w-100" alt="Apple Image 2">
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('./images/apple2.jpg')}}" class="d-block w-100" alt="Apple Image 3">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

            <div class="mt-4 text-white">
                <h3 class="h2">Seller: Green Valley Organics</h3>
                <p>Location: California, USA | Certified Organic and Non-GMO</p>
                <p>Contact: customer@greenvalleyorganics.com | Phone: (555) 123-4567</p>
                <br>
                <h4 class="h2">Product Details</h4>
                <p>Our organic Honeycrisp apples are harvested at peak ripeness, offering a deliciously sweet and crisp taste. These apples are grown without synthetic pesticides, ensuring top quality and freshness.</p>
                <br>
                <h5 class="h2">Price: $50.99 / kg</h5>
                <br>
                <h6 class="h2">Delivery Information</h6>
                <p>Estimated Delivery: 3-5 business days</p>
                <p>Standard Shipping Fee: $4.99 (free on orders over $100)</p>
                <p>Express Shipping: $9.99 for delivery within 1-2 days</p>
            </div>

            <div class="mt-3">
                <button class="btn btn-cart"><a href="./grocery" style="text-decoration: none; color: white;">Back</a></button>
                <button class="btn btn-cart">Add to Cart</button>
            </div>
        </div>
    </div>
</x-master-layout>
