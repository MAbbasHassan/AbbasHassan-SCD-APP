<x-master-layout>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            color: #4a4a4a;
            background-image: url("{{ asset('./images./food.webp') }}");
            background-size: cover;
        }

        /* Product Card Styling */
        .product-card {
            border: 1px solid #ddd;
            border-radius: 15px; /* More rounded corners for a modern look */
            padding: 20px;
            text-align: center;
            background-color: #fff;
            margin-bottom: 30px;
            height: 400px; /* Adjusted height for better spacing */
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Soft shadow for depth */
            transition: transform 0.3s ease, box-shadow 0.3s ease; /* Hover effect */
        }

        .product-card:hover {
            transform: translateY(-5px); /* Slight lift on hover */
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2); /* Slightly stronger shadow on hover */
        }

        .product-card img {
            max-width: 100%;
            max-height: 160px; /* Slightly larger image */
            border-radius: 10px;
            object-fit: cover;
            margin-bottom: 20px;
        }

        .product-card h5 {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 15px;
            color: #333;
        }

        .product-card p {
            font-size: 14px;
            color: #555;
            margin-bottom: 15px;
        }

        .product-card p strong {
            font-size: 16px;
            color: #007bff; /* Color for price */
        }

        .btn {
            padding: 12px 20px;
            border: none;
            border-radius: 25px; /* More rounded buttons */
            font-size: 14px;
            margin: 10px 0;
            transition: background-color 0.3s ease, transform 0.2s ease; /* Button hover effect */
        }

        .btn-primary {
            background-color: #007bff;
            color: white;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            transform: scale(1.05); /* Slight grow effect */
        }

        .btn-success {
            background-color: #28a745;
            color: white;
        }

        .btn-success:hover {
            background-color: #218838;
            transform: scale(1.05);
        }

        .btn-warning {
            background-color: #ffc107;
            color: black;
        }

        .btn-warning:hover {
            background-color: #e0a800;
            transform: scale(1.05);
        }

        /* Search Bar Styling */
        .search-bar {
            margin-bottom: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            position: relative;
        }

        .search-bar input {
            height: 40px;
            width: 350px;
            padding-left: 15px;
            font-size: 16px;
            border-radius: 30px; /* Rounded input field */
            border: 2px solid #ddd;
            transition: border-color 0.3s ease;
        }

        .search-bar input:focus {
            border-color: #007bff; /* Blue border on focus */
        }

        .search-results {
            background-color: white;
            border: 1px solid #ddd;
            max-height: 200px;
            overflow-y: auto;
            position: absolute;
            width: 350px;
            top: 100%;
            left: 0;
            z-index: 1000;
            display: none;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .search-results div {
            padding: 12px;
            cursor: pointer;
            font-size: 16px;
        }

        .search-results div:hover {
            background-color: #f1f1f1;
        }

        /* Actions (Back and View Cart) */
        .actions {
            display: flex;
            justify-content: center;
            gap: 25px;
            margin-top: 30px;
        }

        .actions .btn {
            padding: 15px 25px;
            font-size: 16px;
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
                <div class="h1 text-center mb-5 col-12 text-white pt-5"><strong>All Products</strong></div>
                <!-- Search Bar -->
                <div class="search-bar">
                    <input type="text" id="searchBar" class="form-control" placeholder="Search for products">
                    <button type="button" class="btn btn-primary" id="searchBtn">Search</button>
                    <button type="button" class="btn btn-secondary" id="clearSearch">Clear Search</button>
                    <div id="searchResults" class="search-results"></div>
                </div>

                <!-- Actions (Back and View Cart) -->
                <div class="actions">
                    <a href="{{ route('home') }}" class="btn btn-warning">Back to Home</a>
                    <a href="{{ route('cart.index') }}" class="btn btn-primary">View Cart</a>
                </div>

                <!-- Products List -->
                <div class="row mt-4" id="productList">
                    @foreach ($products as $product)
                        <div class="col-md-4 product-card">
                            <img src="{{ asset('storage/' . $product->picture) }}" alt="{{ $product->name }}">
                            <h5>{{ $product->name }}</h5>
                            <p>{{ $product->description }}</p>
                            <p><strong>${{ $product->price }}</strong></p>
                            <div>
                                <a href="{{ route('product.details', $product->id) }}" class="btn btn-primary">View Details</a>
                                
                                <!-- Buy Now Button -->
                                <form action="{{ route('cart.add', $product->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-success">Buy Now</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <script>
            // Attach event listener to search bar
            document.getElementById('searchBar').addEventListener('keyup', function () {
                const query = this.value;

                if (query.length > 0) {
                    // Use Fetch API to send Ajax request to the search route
                    fetch(`{{ route('products.search') }}?search=${query}`, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest' // Ensure it's an Ajax request
                        }
                    })
                    .then(response => {
                        if (!response.ok) throw new Error('Network response was not ok');
                        return response.json();
                    })
                    .then(data => {
                        const searchResults = document.getElementById('searchResults');
                        searchResults.innerHTML = ''; // Clear previous results

                        if (data.length > 0) {
                            searchResults.style.display = 'block'; // Show dropdown

                            data.forEach(item => {
                                const resultItem = ` 
                                    <div class="search-result-item" data-id="${item.id}">
                                        ${item.name}
                                    </div>
                                `;
                                searchResults.innerHTML += resultItem;
                            });

                            // Add click event to search results to populate the search bar
                            const resultItems = document.querySelectorAll('.search-result-item');
                            resultItems.forEach(item => {
                                item.addEventListener('click', function () {
                                    document.getElementById('searchBar').value = this.textContent;
                                    document.getElementById('searchResults').style.display = 'none'; // Hide dropdown
                                    fetchProductDetails(this.getAttribute('data-id'));
                                });
                            });
                        } else {
                            searchResults.style.display = 'none'; // Hide if no results
                        }
                    })
                    .catch(error => console.error('Error:', error)); // Log errors for debugging
                } else {
                    document.getElementById('searchResults').style.display = 'none'; // Hide dropdown if search bar is empty
                }
            });

            // Fetch and display the product details when a product is clicked
            function fetchProductDetails(productId) {
                fetch(`/products/${productId}`)
                    .then(response => response.json())
                    .then(product => {
                        // Update the product list dynamically if needed
                        // Example: Update the product cards below
                        console.log(product); // Do something with the product data
                    });
            }

            // Clear search functionality
            document.getElementById('clearSearch').addEventListener('click', function() {
                // Clear the search bar
                document.getElementById('searchBar').value = '';

                // Hide the search results dropdown
                document.getElementById('searchResults').style.display = 'none';

                // Fetch all products again to display them
                fetchProducts();
            });

            // Ensure the Search Button does not submit the form
            document.getElementById('searchBtn').addEventListener('click', function(e) {
                e.preventDefault(); // Prevent form submission
                const query = document.getElementById('searchBar').value;
                if (query.length > 0) {
                    fetchProducts(query);
                }
            });

            // Function to fetch products based on the search query
            function fetchProducts(query = '') {
                fetch(`{{ route('products.search') }}?search=${query}`, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    const productList = document.getElementById('productList');
                    productList.innerHTML = ''; // Clear the existing products

                    data.forEach(product => {
                        const productHTML = `
                            <div class="col-md-4 product-card">
                                <img src="{{ asset('storage/') }}/${product.picture}" alt="${product.name}">
                                <h5>${product.name}</h5>
                                <p>${product.description}</p>
                                <p><strong>$${product.price}</strong></p>
                                <div>
                                    <a href="{{ route('product.details', '') }}/${product.id}" class="btn btn-primary">View Details</a>
                                    <form action="{{ route('cart.add', '') }}/${product.id}" method="POST" style="display:inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-success">Buy Now</button>
                                    </form>
                                </div>
                            </div>
                        `;
                        productList.innerHTML += productHTML;
                    });
                })
                .catch(error => console.error('Error:', error)); // Log errors for debugging
            }
        </script>
    </body>
</x-master-layout>
