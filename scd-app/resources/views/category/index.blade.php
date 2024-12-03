<x-master-layout>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            color: #4a4a4a;
            background-image:url("{{asset("./images./food.webp")}}") ;
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
        .bg-blur{
		backdrop-filter:blur(5px);
		height:100%;
		width:100%;
		}
        .container-page {
            max-width: 800px;
            margin: 2rem auto;
            padding: 8rem;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
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
            margin-top: 10px;
        }
        thead {
            background-color: #6b8e23;
            color: white;
        }
        th, td {
            text-align: center;
            padding: 10px;
            border: 1px solid #ddd;
        }
        tbody tr:nth-child(even) {
            background-color: #f8f9fa;
        }
        tbody tr:hover {
            background-color: #d4edda;
            cursor: pointer;
        }
        th {
            font-weight: bold;
        }

    </style>

<body>
    <div class="bg-blur">
    <!-- Admin Panel Main Page -->
    <div id="mainPanel" class="container mt-5 bg-blur text-center">
        <h1 class="text-center mb-4 h1" style="color:white"><strong>Admin-Panel</strong></h1>
        {{-- <button class="btn btn-admin" onclick="openPage('createProductPage')">Create Product</button><br><br><br>
        <button class="btn btn-admin" onclick="openPage('readProductPage')">Read Product</button><br><br><br>
        <button class="btn btn-admin" onclick="openPage('updateProductPage')">Update Product</button><br><br><br>
        <button class="btn btn-admin" onclick="openPage('deleteProductPage')">Delete Product</button><br><br><br> --}}
    
        <a href="{{ url('categoriess/create') }}" class="btn btn-admin">Create Product</a><br><br><br>
        <a href="{{ url('categoriess/read') }}" class="btn btn-admin">Read Product</a><br><br><br>
        <a href="{{ url('categoriess/update') }}" class="btn btn-admin">Update Product</a><br><br><br>
        <a href="{{ url('categoriess/delete') }}" class="btn btn-admin">Delete Product</a><br><br><br>

         <div class="array-container"> 
            

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Is Active</th>
                        <th>created_at</th>
                        <th>updated_at</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categoriess as $item) 
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->description }}</td>
                        <td>
                            @if ($item->is_active)
                                Active
                            @else
                                Not-Active
                            @endif
                        </td>
                        <td>{{ $item->created_at }}</td>
                        <td>{{ $item->updated_at }}</td>
                        <td>
                            <a href="{{ url('categoriess/'.$item->id.'/edit') }}" 
                                class="btn btn-success mx-1">Update</a>
                            <a href="{{ url('categoriess/'.$item->id.'/delete') }}" 
                                class="btn btn-danger mx-1"
                                onclick="return confirm('Are you sure you want to delete this item?')">
                                Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    
    </div>
     {{-- <!-- JavaScript -->
     <script>
        function openPage(pageId) {
            document.querySelectorAll('.container-page, #mainPanel').forEach(el => el.classList.add('d-none'));
            document.getElementById(pageId).classList.remove('d-none');
        }

        function goBack() {
            document.querySelectorAll('.container-page').forEach(el => el.classList.add('d-none'));
            document.getElementById('mainPanel').classList.remove('d-none');
        }
    </script> --}}
</body>
</x-master-layout>