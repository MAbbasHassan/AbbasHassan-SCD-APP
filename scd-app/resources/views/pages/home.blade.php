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
        .hero {
            height: 40vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: white;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6);
            margin-bottom: 2rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .hero h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
        }
        .hero p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
        }
        .about-section {
            max-width: 800px;
            margin: 2rem auto;
            padding: 1rem;
            background: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            opacity: 0; 
            transform: translateY(20px); 
            animation: fadeInUp 1.8s forwards; 
            animation-delay: 0.7s; 
        }
        @keyframes fadeInUp {
            to {
                opacity: 8; /* Fully visible */
                transform: translateY(0); /* Move to original position */
            }
        }
        .about-section h2 {
            text-align: center;
            color: #4A5B4F;
            margin-bottom: 1rem;
        }
        .about-section p {
            text-align: center;
            font-size: 1.1rem;
            line-height: 1.5;
        }
        .carousel-container {
            max-width: 800px;
            margin: 2rem auto;
        }
        .carousel-item img {
            width: 100%;
            height: 400px;
            border-radius: 10px;
            object-fit: cover;   
        }
        .btn-shop {
            background-color: #6b8e23;
            border: none;
            transition: background-color 0.3s, transform 0.3s;
        }
        .btn-shop:hover {
            background-color: #556b2f;
            transform: scale(1.05);
        }
        .category-card {
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .category-img {
            height: 200px;
            object-fit: cover;
        }
        .category-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        }
        .bg-blur {
            backdrop-filter: blur(5px);
            height: 100%;
            width: 100%;
        }
    </style>
    
    <div class="bg-blur">
        <div class="hero">
            <h1><strong>True Organic Hub!</strong></h1>
            <p><strong>Your Destination For Pure And Natural Products!!</strong></p>
            <a class="btn btn-shop btn-lg" href="./grocery" role="button">Shop Now</a>
        </div>

        <div class="about-section">
            <h2><strong>About Us</strong></h2>
            <p>True Organic Hub is dedicated to providing you with the best organic products that are both healthy and sustainable. We believe that everyone deserves access to pure, natural goods that promote wellness and support the environment.</p>
            <p>Our mission is to curate a selection of top-quality products sourced from trusted suppliers, ensuring that you receive only the finest organic offerings. Join us in our journey towards a healthier lifestyle!</p>
        </div>

        <div class="carousel-container">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="5" aria-label="Slide 6"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{asset('./images/air.jpg')}}" alt="Slide 1">
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('./images/skin.jpg')}}" alt="Slide 2">
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('./images/cleaning1.webp')}}" alt="Slide 3">
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('./images/baby.webp')}}" alt="Slide 4">
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('./images/tea.jpg')}}" alt="Slide 5">
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('./images/suppli.jfif')}}" alt="Slide 6">
                    </div>
                </div>
            </div>
        </div>

        <div class="container mt-5">
            <h2 class="text-center mb-4 h1" style="color:white"><strong>Explore Our Categories</strong></h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card category-card text-center">
                        <img src="{{asset('./images/homep.jpg')}}" class="card-img-top category-img" alt="Organic Food">
                        <div class="card-body">
                            <h5 class="card-title">Food & Groceries</h5>
                            <p class="card-text">Fresh, pesticide-free groceries including fruits, vegetables, and more.</p>
                            <a href="./grocery" class="btn btn-shop">Visit & Shop</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card category-card text-center">
                        <img src="{{asset('./images/home_p2.webp')}}" class="card-img-top category-img" alt="Organic SkinCare">
                        <div class="card-body">
                            <h5 class="card-title">Skincare & Beauty</h5>
                            <p class="card-text">Gentle, effective, and natural skincare solutions for a healthy glow.</p>
                            <a href="./skincare" class="btn btn-shop">Visit & Shop</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card category-card text-center">
                        <img src="{{asset('./images/ppp.webp')}}" class="card-img-top category-img" alt="Organic Cleaning">
                        <div class="card-body">
                            <h5 class="card-title">Home & Cleaning Supplies</h5>
                            <p class="card-text">Organic home and cleaning supplies use natural ingredients for a safer environment.</p>
                            <a href="./cleaning" class="btn btn-shop">Visit & Shop</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card category-card text-center">
                        <img src="{{asset('./images/baby.webp')}}" class="card-img-top category-img" alt="Organic SkinCare">
                        <div class="card-body">
                            <h5 class="card-title">Baby & Kids</h5>
                            <p class="card-text">Organic baby and kids products are safe, natural, and eco-friendly.</p>
                            <a href="./baby" class="btn btn-shop">Visit & Shop</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card category-card text-center">
                        <img src="{{asset('./images/health.webp')}}" class="card-img-top category-img" alt="Organic SkinCare">
                        <div class="card-body">
                            <h5 class="card-title">Health & Wellness</h5>
                            <p class="card-text">Fresh, pesticide-free groceries including fruits, vegetables, and more.</p>
                            <a href="./health" class="btn btn-shop">Visit & Shop</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card category-card text-center">
                        <img src="{{asset('./images/hyg.webp')}}" class="card-img-top category-img" alt="Organic SkinCare">
                        <div class="card-body">
                            <h5 class="card-title">Personal Care & Hygiene</h5>
                            <p class="card-text">Organic personal care and hygiene products use natural ingredients for gentle cleansing.</p>
                            <a href="./hygiene" class="btn btn-shop">Visit & Shop</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-master-layout>
