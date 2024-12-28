<x-master-layout>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            color: #4a4a4a;
            background-image: url("{{ asset('./images./food.webp') }}");
            background-size: cover;  
        }
        .btn-admin {
            width: 200px;
            margin: 10px;
            background-color: #6b8e23;
            color: white;
            border: none;
            transition: background-color 0.3s, transform 0.3s;
        }
        .btn-admin:hover {
            background-color: #556b2f;
            transform: scale(1.05);
        }
        .btn-back {
            background-color: #ffc107;
            color: black;
            padding: 10px 15px;
            border-radius: 5px;
            font-size: 16px;
            border: none;
            transition: background-color 0.3s, transform 0.3s;
        }
        .btn-back:hover {
            background-color: #e0a800;
            transform: scale(1.05);
        }
        .bg-blur {
            backdrop-filter: blur(5px);
            height: 100%;
            width: 100%;
        }
        .container-page {
            max-width: 800px;
            margin: 2rem auto;
            padding: 8rem;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }
    </style>

    <body>
        <div class="bg-blur">
            <!-- Admin Panel Main Page -->
            <div id="mainPanel" class="container mt-5 bg-blur text-center">
                <h1 class="text-center mb-4 h1" style="color:white"><strong>Admin Panel</strong></h1>

                <!-- Admin Options -->
                <a href="{{ url('products/create') }}" class="btn btn-admin">Create Product</a><br><br><br>
                <a href="{{ url('products/read') }}" class="btn btn-admin">Read Product</a><br><br><br>
                <a href="{{ url('products/update') }}" class="btn btn-admin">Update Product</a><br><br><br>
                <a href="{{ url('products/delete') }}" class="btn btn-admin">Delete Product</a><br><br><br>

                <!-- Go Back Button -->
                <a href="{{ route('home') }}" class="btn btn-back mt-4">Go Back to Home</a>
            </div>
        </div>
    </body>
</x-master-layout>
