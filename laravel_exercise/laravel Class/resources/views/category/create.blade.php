<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{route('category.store')}}" method="post">
        @csrf
        <label for="">Category Name</label>
        <input type="text" name="name" id=""><br>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</body>
</html>