<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>New product</h1>
    <a href="{{ route('products.index') }}">Back to products</a>
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="categrory_id">Category</label><br>
        @error('categrory_id') <div>{{ $message }}</div> @enderror
        <select id="categrory_id" name="categrory_id" required>
            <option value="">Select a category</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" @selected(old('categrory_id') == $category->id)>{{ $category->name }}</option>
            @endforeach
        </select><br>
        <label for="">Name</label><br>
        @error('name') <div>{{ $message }}</div> @enderror
        <input type="text" name="name" value="{{ old('name') }}" placeholder="Name...."><br>
        <label>price</label><br>
        @error('price') <div>{{ $message }}</div> @enderror
        <input type="text" name="price" value="{{ old('price') }}" placeholder="price...."><br>
        <label>stock</label><br>
        @error('stock') <div>{{ $message }}</div> @enderror
        <input type="text" name="stock" value="{{ old('stock') }}" placeholder="stock...."><br>
        <label>image</label><br>
        @error('image') <div>{{ $message }}</div> @enderror
        <input type="file" name="image" accept="image/*"><br>
        <label>description</label><br> 
        @error('description') <div>{{ $message }}</div> @enderror
        <input type="text" name="description" value="{{ old('description') }}" placeholder="description...."><br>
        <button type="submit"> create</button>
    </form>
</body>
</html>