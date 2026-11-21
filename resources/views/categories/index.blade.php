<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Categories</h1>
    <a href="{{ route('categories.create') }}">Create category</a>

    @if (session('successful'))
        <div>{{ session('successful') }}</div>
    @endif

    <table border="1" cellspacing="4">
        <tr>
            <td>id</td>
            <td>name</td>
            <td>description</td>
            <td>created_at</td>
            <td>updated_at</td>
            <td>actions</td>
        </tr>
        
        @foreach($cat as $category)
        <tr>
            <td>{{$category->id}}</td>
            <td>{{$category->name}}</td>
            <td>{{$category->description}}</td>
            <td>{{$category->created_at}}</td>
            <td>{{$category->updated_at}}</td>
            <td>
                <a href="{{ route('categories.show', $category->id) }}">View</a>
                <a href="{{ route('categories.edit', $category->id) }}">Edit</a>
                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline">
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