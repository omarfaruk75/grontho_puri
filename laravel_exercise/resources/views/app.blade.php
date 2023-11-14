<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    This is from app
    @yield('section_one')
    <br><br><br>
    @yield('section_two')

    <div class="col-md-3">
        @section('advertisement')
        <p>
            Jamz and Sun Lotion Special $29!
        </p>
        @show
    </div>
</body>
</html>