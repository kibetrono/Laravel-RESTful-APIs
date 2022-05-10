@extends('home')

 
@section('title')

<div class="row">
    <div class="col-md-5 text-left">

    <p class="text-md"><i class="fa fa-users"></i> Reqistered User Details</p>
    <p class="text-lg"><i class="fa fa-users"></i> Reqistered User ID #{{Auth::user()->id}}</p>

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
<div class="container">
<div class="row mt-3">   
    <div class="col-sm-12 ">

            <div class="card">
                <div class="card-header">
                    Registered User
                    <p>Joined on: {{Auth::user()->created_at}}</p>
                </div>
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="avatar avatar-sm avatar-circle mr-2">
                            <img class="avatar-img"  src="https://konza.softwareske.net/assets/admin/img/160x160/img1.jpg" alt="Image Description" style="width:30px;height:30px;border-radius:100px">
                        </div>
                        <div class="media-body">
                            <span class="card-text">{{Auth::user()->name}}</span>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <p>Contact Information</p>
                    <p>Email Address: {{Auth::user()->email}}</p>
                    <p>Phone no.: {{Auth::user()->telephone}}</p>
                </div>
            </div>

    </div>
  
</div> 

</div>


@stop
