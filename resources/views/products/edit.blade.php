<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
</head>
<body>
    <h1>Edit Product</h1>
    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ $product->name }}" required>
        <br>
        <label for="description">Description:</label>
        <textarea id="description" name="description" required>{{ $product->description }}</textarea>
        <br>
        <label for="price">Price:</label>
        <input type="number" id="price" name="price" value="{{ $product->price }}" step="0.01" required>
        <br>
        <label for="stock">Stock:</label>
        <input type="number" id="stock" name="stock" value="{{ $product->stock }}" required>
        <br>
        <button type="submit">Update</button>
    </form>
</body>
</html>
