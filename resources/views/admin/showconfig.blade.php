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
                <h2 class="col-4 mt-4"><i class=" fa fa-envelope font-weight-bold col-3" style="font-size: 40px;"></i>
                    Emails</h2>
                <a href="/addconfig" class="btn btn-success container col-2 mt-4">
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
                    <th>Email</th>
                    <th>Action</th>
                </tr>
                @php
                $sn=1;
                @endphp
                @foreach($data as $q)
                <tr>
                    <td>{{$sn++}}</td>
                    <td>{{$q->email}}</td>
                    <td>
                        <a href="/edit/{{$q->id}}" class="fa fa-edit text-warning "style="font-size:30px;"></a>
                        <a href="/delconfig/{{$q->id}}" class="fa fa-trash"style="font-size:30px;"></a>
                    </td>
                </tr>


                @endforeach
            </table><br>


        </div>
    </div>
    @endsection
</body>

</html>