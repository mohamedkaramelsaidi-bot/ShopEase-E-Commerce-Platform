<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h1>products</h1>
    <a href="{{ route('products.create') }}">Create product</a>

    @if (session('successful'))
        <div>{{ session('successful') }}</div>
    @endif

    <table border="1" cellspacing="4">
        <tr>
            <td>id</td>
            <td>category</td>
            <td>name</td>
            <td>description</td>
            <td>price</td>
            <td>stock</td>
            <td>image</td>
            <td>created_at</td>
            <td>updated_at</td>
            <td>actions</td>
        </tr>
        
        @foreach($products as $product)
        <tr>
            <td>{{$product->id}}</td>
            <td>{{ optional($product->categrory)->name }}</td>
            <td>{{$product->name}}</td>
            <td>{{$product->description}}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->stock}}</td>
            <td>
                    {{$product->image }}
            
            </td>
            <td>{{$product->created_at}}</td>
            <td>{{$product->updated_at}}</td>
            <td>
                <a href="{{ route('products.show', $product->id) }}">View</a>
                <a href="{{ route('products.edit', $product->id) }}">Edit</a>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
        
    </table>
</body>
</html>