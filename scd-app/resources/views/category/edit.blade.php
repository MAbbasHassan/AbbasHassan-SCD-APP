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
    </style>
    <body>
        @if (session('status'))
        <div class="alert alert-success">{{session ('status')}}</div>
            
        @endif


        <div class="bg-blur">
        <div id="createProductPage" class="container-page">
            <h1 class="text-center mb-4 h1" style="color:black"><strong>Admin-Panel -- Update Product</strong></h1>
            <form action="{{ url('categoriess/'.$category->id.'/edit') }}" method="POST">
                @csrf
                @method("PUT")

                <div class="mb-3">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $category->name }}"/>
                    @error('name') <span class="text-danger">{{$message}}</span>@enderror
                
                </div>
                {{-- <div class="mb-3">
                    <label for="productPrice" class="form-label">Product Price</label>
                    <input type="number" class="form-control" id="productPrice" required>
                </div>
                <div class="mb-3">
                    <label for="productImage" class="form-label">Product Image URL</label>
                    <input type="text" class="form-control" id="productImage" required>
                </div>
                <div class="mb-3">
                    <label for="productCategory" class="form-label">Category</label>
                    <select class="form-select" id="productCategory" required>
                        <option value="food">Food</option>
                        <option value="skincare">Skincare</option>
                        <option value="cleaning">Cleaning</option>
                        <option value="baby">Baby</option>
                        <option value="health">Health</option>
                        <option value="personal care">Personal Care</option>
                    </select>
                </div> --}}
                <div class="mb-3">
                    <label>Description</label>
                    <textarea name="description" class="form-control" rows="3"> {{ $category->description }} </textarea>
                    @error('description') <span class="text-danger">{{$message}}</span>@enderror
                </div>
                <div class="mb-3">
                    <label>Is_Active</label>
                    <input type="checkbox" name="is_active" {{ $category->is_active == true ? 'checked':'' }} />
                    @error('is_active') <span class="text-danger">{{$message}}</span>@enderror
                </div>
                <button type="submit" class="btn btn-success">Update_Product</button>
                <a href="{{ url('categoriess/create') }}" class="btn btn-secondary">Go Back</a>
                {{-- <button type="button" class="btn btn-secondary" onclick="goBack()">Go Back</button> --}}
            </form>
        </div>
        </div>
    </body>

</x-master-layout>