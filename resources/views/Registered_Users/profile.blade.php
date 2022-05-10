@extends('home')

 
@section('title')

<div class="row">
    <div class="col-md-5 text-left">
    <h3><i class="fa fa-user"></i> {{Auth::User()->email}} </h3>

    </div>
   
</div>
<hr>
@stop

@section('content')
<div class="container-fluid">
<div class="row">
    <div class="col-md-12 ">
      

        <table id="w0" class="table table-striped table-bordered detail-view">
            <tbody>
                
<tr><th>Username</th><td>{{Auth::User()->name}}</td></tr>
<tr><th>Email</th><td><a href="mailto:david.rono@softwareske.com">{{Auth::User()->email}}</a></td></tr>
<tr><th>Created on</th><td>{{Auth::User()->created_at}}</td></tr>
<tr><th>Update on</th><td>{{Auth::User()->updated_at}}</td></tr>
</tbody>
</table>
</div>


</div>


@stop
