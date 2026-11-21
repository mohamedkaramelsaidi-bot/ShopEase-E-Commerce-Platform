<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="{{ route('products.index') }}">Back to products</a>
    <table border="1" cellspacing="4">
        <tr>
            <td>id</td>
            <td>name</td>
            <td>description</td>
            <td>price</td>
            <td>stock</td>
            <td>created_at</td>
            <td>updated_at</td>
        </tr>
        

        <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->name}}</td>
            <td>{{$product->description}}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->stock}}</td>
            <td>{{$product->created_at}}</td>
            <td>{{$product->updated_at}}</td>
        
        </tr>
       
        
    </table>
    <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}">
</body>
</html>