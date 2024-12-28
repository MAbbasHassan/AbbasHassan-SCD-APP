<x-master-layout>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            color: #4a4a4a;
            background-image: url("{{ asset('./images/food.webp') }}");
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

        .bg-blur {
            backdrop-filter: blur(5px);
            height: 100%;
            width: 100%;
        }

        .container-page {
            max-width: 900px;
            margin: 2rem auto;
            padding: 3rem;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .array-container {
            width: 100%;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        thead {
            background-color: #6b8e23;
            color: white;
            text-transform: uppercase;
        }

        th, td {
            text-align: center;
            padding: 12px 18px;
            border: 1px solid #ddd;
        }

        th {
            font-weight: bold;
            font-size: 16px;
        }

        td {
            font-size: 14px;
            color: #333;
        }

        tbody tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        tbody tr:hover {
            background-color: #d4edda;
            cursor: pointer;
            transform: scale(1.02);
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .search-container {
            margin-bottom: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .search-container input {
            width: 250px;
            padding: 12px;
            margin-right: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
        }

        .search-container button {
            padding: 12px 20px;
            background-color: #6b8e23;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .search-container button:hover {
            background-color: #556b2f;
        }

        .image-thumbnail {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 5px;
        }

        .btn-action {
            font-size: 14px;
            padding: 8px 14px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn-success {
            background-color: #28a745;
            color: white;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        .btn-danger {
            background-color: #dc3545;
            color: white;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        .btn-secondary {
            background-color: #6c757d;
            color: white;
            border-radius: 5px;
            padding: 12px;
            margin-left: 10px;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }

        .go-back-btn {
            background-color: #6c757d;
            color: white;
            border-radius: 5px;
            padding: 12px;
            margin-bottom: 20px;
            display: inline-block;
            text-decoration: none;
            text-align: center;
        }

        .go-back-btn:hover {
            background-color: #5a6268;
        }
    </style>

    <body>
        <div class="bg-blur">
            <br><br>
            <h1 class="text-center mb-4 h1" style="color:white"><strong>Admin Panel - Read Product</strong></h1>

            <!-- Go Back Button -->
            <div class="text-center">
                <a href="{{ route('products.index') }}" class="go-back-btn">Go Back</a>
            </div>

            <!-- Search Form -->
            <div class="search-container">
                <input type="text" id="searchBar" class="form-control" placeholder="Search...">
            </div>

            <div class="array-container">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Category ID</th>
                            <th>Picture</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="productTable">
                        @foreach ($products as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->description }}</td>
                            <td>{{ $item->price }}</td>
                            <td>{{ $item->category->name }}</td>
                            <td>
                                <img src="{{ asset('storage/'.$item->picture) }}" alt="Product Image" class="image-thumbnail">
                            </td>
                            <td>{{ $item->created_at }}</td>
                            <td>{{ $item->updated_at }}</td>
                            <td>
                                <a href="{{ url('products/'.$item->id.'/edit') }}" class="btn btn-success mx-1 btn-action">Update</a>
                                <a href="{{ url('products/'.$item->id.'/delete') }}" class="btn btn-danger mx-1 btn-action" onclick="return confirm('Are you sure you want to delete this item?')">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <script>
            // Attach event listener to search bar
            document.getElementById('searchBar').addEventListener('keyup', function () {
                const query = this.value;

                // Use Fetch API to send Ajax request to the search route
                fetch(`{{ route('products.search') }}?search=${query}`, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest' // Ensure it is an Ajax request
                    }
                })
                .then(response => {
                    if (!response.ok) throw new Error('Network response was not ok');
                    return response.json();
                })
                .then(data => {
                    const tableBody = document.getElementById('productTable');
                    tableBody.innerHTML = ''; // Clear the table

                    // Append rows dynamically
                    data.forEach(item => {
                        const row = `
                            <tr>
                                <td>${item.id}</td>
                                <td>${item.name}</td>
                                <td>${item.description}</td>
                                <td>${item.price}</td>
                                <td>${item.category_id}</td>
                                <td>
                                    <img src="/storage/${item.picture}" alt="Product Image" class="image-thumbnail">
                                </td>
                                <td>${item.created_at}</td>
                                <td>${item.updated_at}</td>
                                <td>
                                    <a href="/products/${item.id}/edit" class="btn btn-success mx-1 btn-action">Update</a>
                                    <a href="/products/${item.id}/delete" class="btn btn-danger mx-1 btn-action" onclick="return confirm('Are you sure you want to delete this item?')">Delete</a>
                                </td>
                            </tr>
                        `;
                        tableBody.innerHTML += row;
                    });
                })
                .catch(error => console.error('Error:', error)); // Log errors for debugging
            });
        </script>
    </body>
</x-master-layout>
