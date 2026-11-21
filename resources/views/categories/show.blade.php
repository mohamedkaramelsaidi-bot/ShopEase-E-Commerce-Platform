<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="{{ route('categories.index') }}">Back to categories</a>
    <table border="1" cellspacing="4">
        <tr>
            <td>id</td>
            <td>name</td>
            <td>description</td>
            <td>created_at</td>
            <td>updated_at</td>
        </tr>
        

        <tr>
            <td>{{$cat->id}}</td>
            <td>{{$cat->name}}</td>
            <td>{{$cat->description}}</td>
            <td>{{$cat->created_at}}</td>
            <td>{{$cat->updated_at}}</td>
        
        </tr>
       
        
    </table>
</body>
</html>