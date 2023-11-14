<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <td>#SL</td>
            <td>Category</td>
            <td>Image</td>
            <td>Action</td>
        </tr>
        @forelse($category as $cat)
            <tr>
                <td>{{$cat->id}}</td>
                <td>{{$cat->name}}</td>
                <td>{{$cat->image}}</td>
                <td>
                    <a href="{{route('category.show',$cat->id)}}">Show</a>
                    <a href="{{route('category.edit',$cat->id)}}">Edit</a>
                    <form action="{{route('category.destroy',$cat->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4"></td>
            </tr>
        @endforelse
    </table>
</body>
</html>