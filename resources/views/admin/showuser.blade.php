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
                <h2 class="col-7 mt-4 fa fa-user font-weight-bold" style="font-size: 40px;">
                    User Details</h2>
                <a href="/adduser" class="btn btn-success container col-2 mt-4">
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
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                @php
                $sn=1;
                @endphp
                @foreach($data as $q)
                <tr>
                    <td>{{$sn++}}</td>
                    <td>{{$q->firstname}}</td>
                    <td>{{$q->lastname}}</td>
                    <td>{{$q->email}}</td>
                    @if($q->role_id=='1')
                    <td>Superadmin</td>
                    @endif
                    @if($q->role_id=='2')
                    <td>admin</td>
                    @endif
                    @if($q->role_id=='3')
                    <td>inventory manager</td>
                    @endif
                    @if($q->role_id=='4')
                    <td>order manager</td>
                    @endif
                    @if($q->role_id=='5')
                    <td>customer</td>
                    @endif
                   
                    <td>{{$q->status}}</td>
                    <td>
                        <a href="/edituser/{{$q->id}}" class="fa fa-edit text-warning "style="font-size:30px;"></a>
                        <a href="/deluser/{{$q->id}}" class="fa fa-trash"style="font-size:30px;"></a>
                    </td>
                </tr>


                @endforeach
            </table><br>


        </div>
    </div>
    @endsection
</body>

</html>