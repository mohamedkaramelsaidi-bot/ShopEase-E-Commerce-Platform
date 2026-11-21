<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>New category</h1>
    <a href="{{ route('categories.index') }}">Back to categories</a>
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <label for="">Name</label><br>
        @error('name') <div>{{ $message }}</div> @enderror
        <input type="text" name="name" value="{{ old('name') }}" placeholder="Name...."><br>
        <label>description</label><br> 
        @error('description') <div>{{ $message }}</div> @enderror
        <input type="text" name="description" value="{{ old('description') }}" placeholder="description...."><br>
        <button type="submit"> Save</button>
    </form>
</body>
</html>