@extends('home')

 
@section('title')

<div class="row">
    <div class="col-md-5 text-left">

    <h1><i class="fa fa-users"></i> Reqistered Users</h1>

    </div>
    <div class="col-md-4">

            <form class="input-group">
                <input type="text" class="form-control" placeholder="Search"  value="">
                <div class="input-group-append">
                    <button type="submit" class="input-group-text">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </form>
       
    </div>
  
</div>
<hr>
@stop

@section('content')
<div class="container-fluid">
<div class="row">   
    <div class="col-sm-12 ">

<div class="card">
<table class="table table-borderless" >
<thead class="thead-light">
<tr>
                        <th class="">
                            #
                        </th>
                        <th class="table-column-pl-0">Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Actions</th>
                    </tr>
</thead>
<tbody>
@foreach ($users as $user)

<tr data-key="44">
    <td>{{$user->id}}</td>
    <td class="text-success">{{$user->name}}</td>
    <td>{{$user->email}}</td>
    <td>{{$user->telephone}}</td>
    <td>
            <div class="dropdown">
                <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-cog"></i>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{route('user_list.show',$user->id)}}">
                        <i class="fa fa-eye"></i> View
                    </a>
                    <a class="dropdown-item"  href="{{route('user_list.destroy',$user->id)}}">
                        <i class="fa fa-trash"></i> Delete User
                    </a>
                </div>
            </div>
        </td>
   
</tr>

        
        @endforeach
</tbody>

    </table>
    
    <!-- {{ $users->links() }} -->
     
</div>

</div>
  
</div> 

</div>


@stop
