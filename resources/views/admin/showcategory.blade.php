@extends('dashboard')
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>
</head>

<body>
    @section('con')

    <div class="container">
        <div class="container table-light border">
        <div class="row">
        <h2 class="col-7 mt-4 fa fa-th-large text-success font-weight-bold" style="font-size: 40px;" > 
        Categories</h2>
        </div>
        <br>
            @if(Session::has('error'))
            <div class="alert alert-success font-weight-bold mt-3 col-10 container ">{{Session::get('error')}}
           <i class="fa fa-check-circle text-success" aria-hidden="true"></i> 
            </div>
            @endif
            <br>

        <table class="table mt-4">
            <tr >
                <th>S.no</th>
                <th>Title</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
            @php
                $sn=1;
                @endphp
                @foreach($data as $q)
                <tr>
                    <td>{{$sn++}}</td>
                    <td>{{$q->title}}</td>
                    <td>{{$q->description}}</td>
                    <td>
                        <a href="/editcategory/{{$q->id}}" class="btn btn-primary">Edit</a>
                        <a href="/delcat/{{$q->id}}" class="btn btn-success">
                                    Delete</a>
                    </td>
                </tr> 
                       @endforeach


        </table><br>
    </div>
    </div>
    @endsection
</body>

</html>