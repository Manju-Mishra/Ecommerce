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
                <h2 class="col-8 mt-4 fa fa-th font-weight-bold  "style="font-size: 40px;">
                    User Details</h2>
            </div>
            <br>
            <table class="table mt-4">
                <tr class="col"> 
                    <th>S.no</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th >Contact Number</th>
                    <th>Address</th>
                    <th>Pincode</th>
                </tr>
                @php
                $sn=1;
                @endphp
                @foreach($data as $q)
                <tr>
                    <td>{{$sn++}}</td>
                    <td>{{$q->firstname}}&ensp;{{$q->lastname}}</td>
                    <td>{{$q->email}}</td>
                    <td>{{$q->phonenumber}}</td>
                    <td>{{$q->address}}<br>{{$q->city}}</td>
                    <th>{{$q->pincode}}</th>
                </tr> 
                @endforeach
            </table><br>

           
            <div class="row">
                <h2 class="col-8 mt-4 fa fa-user text-success font-weight-bold  "style="font-size: 40px;">
                   User Order Details</h2>
            </div>
            <br>
            <table class="table mt-4">
                <tr class="col"> 
                    <th>S.no</th>
                    <th>Email</th>
                    <th >Product Id</th>
                    <th >Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                    <th>Payment Mode</th>
                </tr>
                @php
                $sn=1;
                @endphp
                @foreach($product as $q)
                <tr>
                    <td>{{$sn++}}</td>
                    <td>{{$q->useremail}}</td>
                    <td>{{$q->product_id}}</td>
                    <td>{{$q->productname}}</td>
                    <td>{{$q->quantity}}</td>
                    <td>{{$q->price}}</td>
                    <td>{{$q->total}}</td>
                    <td>{{$q->payment_mode}}</td>
                </tr> 
                @endforeach
            </table><br>
        </div>
    </div>
    @endsection
</body>

</html>