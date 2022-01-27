@extends('dashboard')
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>
</head>

<body>
    @section('con')

    <div class="container">
        <div class="container table-light">

            <div class="row">
                <h2 class="col-7 mt-4 fa fa-th text-danger font-weight-bold" style="font-size: 40px;">
                    Products</h2>
                <a href="/addproduct" class="btn btn-success container col-2 mt-4">
                <i class=" fa fa-plus font-weight-bold text-light"></i>    
                &emsp;Add 
              </a>
            </div>
            <br>
            @if(Session::has('error'))
            <div class="alert alert-success font-weight-bold mt-3 col-10 container ">{{Session::get('error')}}
           <i class="fa fa-check-circle text-success" aria-hidden="true"></i> 
            </div>
            @endif
            <br>
            <table class="table mt-4">
                <tr class="">
                    <th>S.no</th>
                    <th>Product Name</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Brand</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
                @php
                $sn=1;
                @endphp
                @foreach($data as $q)
                <tr>
                    <td>{{$sn++}}</td>
                     <td>{{$q->productname}}</td>
                     <td>{{$q->description}}</td>
                     <td>{{$q->category_id}}</td>
                     <td>{{$q->brand}}</td>
                     <td>{{$q->price}}</td>
                     <td>{{$q->quantity}}</td>
                     <td>
                     <img src="{{('/uploads/'.$q->image)}}" alt="no image" height="40" weight="40">
                     </td>
                    <td>
                        <a href="/editproduct/{{$q->id}}" class="fa fa-edit text-warning "style="font-size:30px;"></a>
                        <a href="/delproduct/{{$q->id}}" class="fa fa-trash"style="font-size:30px;"></a>
                    </td>
                </tr>


                @endforeach
            </table><br>


        </div>
    </div>
    @endsection
</body>

</html>