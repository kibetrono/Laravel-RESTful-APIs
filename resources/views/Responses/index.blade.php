@extends('home')

@section('title')
    
@foreach($surveys as $survey)
    

<div class="row">
    <div class="col-md-6 text-left">

    <p class="text-lg">{{$survey->responses->count()}} Responses to Survey</p>

    <h1>{{$survey->title}}</h1>

    </div>
    <div class="col-md-3">

           
       
    </div>
    <div class="col-md-3" id="add_s">

        <form class="input-group">
            <input type="text" class="form-control" placeholder="Search "  value="">
            <div class="input-group-append">
                <button type="submit" class="input-group-text">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </form>
    </div>
</div>
<hr>

@endforeach
@stop
@section('content')
<div class="container-fluid">
    <div class="row">
    
        <div class="col-md-12">
        
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert">
                <i class="fa fa-times"></i>
            </button>
            <p>{{ $message }}</p> 
        </div>
        
    
        @elseif($message = Session::get('danger'))
    
        <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert">
            <i class="fa fa-times"></i>
        </button>
            <p>{{ $message }}</p>
        </div>
      
         @endif
    
        </div>    
    </div>
    
    <div class="row">
    
       
        <div class="col-sm-12 ">
    
            <div class="card">
                    <table class="table table-borderless" >
                        <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th style="width: 50%">RESPONDENT</th>
                                    <th>QUESTION</th>
                                    <th>ANSWERS</th>
                                    <th>STATUS</th>
                                </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>                    
                                    <td></td>
                                </tr>

                        </tbody>
                    
                        </table>
                
                <div class="card-footer"></div>
            </div>
    
        </div>
      
    </div> 
    
    </div>
        
</div>
    </div> 
@stop
