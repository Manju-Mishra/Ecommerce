@extends('dashboard')
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    @section('con')

    <div class="container">
        <div class="container table-light">
        <div class="row">
        <h2 class="col-7 mt-4 fa fa-file-image font-weight-bold" style="font-size: 40px;">
          CMS Details</h2>
            <a href="/addcms" class="btn btn-success  col-3 container mt-4">Add CMS</a>
        </div>
        <br>
            @if(Session::has('error'))
            <div class="alert alert-success font-weight-bold mt-3 col-10 container ">{{Session::get('error')}}
           <i class="fa fa-check-circle text-success" aria-hidden="true"></i> 
            </div>
            @endif
            <br>
        <table class="table mt-4" border=2>
            <tr class="">
                <th>S.no</th>
                <th>Title</th>
                <th>Description</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
            @php
                $sn=1;
                @endphp
                @foreach($cms as $q)
                <tr>
                    <td>{{$sn++}}</td>
                     <td>{{$q->title}}</td>
                     <td>{{$q->description}}</td>
                     <td>
                     <img src="{{('/uploads/'.$q->image)}}" alt="no image" height="60" weight="40">
                     </td>
                    <td>
                        <a href="/editcms/{{$q->id}}" class="fa fa-edit text-warning "style="font-size:30px;"></a>
                        <a href="/delcms/{{$q->id}}" class="fa fa-trash"style="font-size:30px;"></a>
                    </td>
                </tr>


                @endforeach
        
        </table><br><br>

    </div>
    </div>
    @endsection
</body>

</html>