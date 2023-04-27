<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Home Page</title>
</head>
<body>

    {{-- <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Products</h2>
                <a href="{{  }}" class="btn btn-primary mb-3">Create Product</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->price }}</td>
                                <td>
                                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-info">Show</a>
                                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div> --}}

    <div class="row">
        <div class="col-md-12">
            <h2>Create Product</h2>
            <form action="{{ route('products.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Product name</label>
                    <input type="text" name="product_name" class="form-control">
                </div>
                <div class="form-group">
                    <label>Product price</label>
                    <input type="number" name="product_price" class="form-control">
                </div>
                <div class="form-group">
                    <label>Product size</label>
                    <input type="text" name="product_size" class="form-control">
                </div>
                <div class="form-group">
                    <label>Product type</label>
                    <input type="number" name="product_type" class="form-control">
                </div>
                <div class="form-group">
                    <label>Product image</label>
                    <input type="file" name="product_image" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>