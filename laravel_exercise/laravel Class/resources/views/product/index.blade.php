<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('/bootstrap/css/bootstrap.min.css')}}">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <table class="table">
                    <tr>
                        <th>#SL</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Sub Category</th>
                        <th>Sub Sub Category</th>
                        <th>Brand</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Action</th>
                    </tr>
                    @forelse($product as $p)
                        <tr>
                            <td>1</td>
                            <td>{{$p->name}}</td>
                            <td>{{$p->category_id}}</td>
                            <td>{{$p->sub_category_id}}</td>
                            <td>{{$p->sub_sub_category_id}}</td>
                            <td>{{$p->brand_id}}</td>
                            <td>{{$p->price}}</td>
                            <td>{{$p->stock}}</td>
                            <td></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9">No Data Found</td>
                        </tr>
                    @endforelse
                </table>
            </div>
        </div>
    </div>
    
</body>
</html>