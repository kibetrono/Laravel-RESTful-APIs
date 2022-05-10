@extends('home')

 
@section('title')

<div class="row">
    <div class="col-md-8 text-left">

    <h1><i class="fa fa-comment"></i> Main Survey</h1>

    </div>
    <div class="col-md-2">

            <form class="input-group">
                <input type="text" class="form-control" placeholder="Search your survey"  value="">
                <div class="input-group-append">
                    <button type="submit" class="input-group-text ">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </form>
       
    </div>
    <div class="col-md-2" id="add_s">
    <a class="btn btn-success py-2 px-5 text-sm"  href="#new_survey" data-toggle="collapse" > Add New Survey</a>

    </div>
</div>
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
   <!--add survey create modal-->
   <div class="collapse" id="new_survey" role=dialog>
    <div class="">
        <div class="">
        <form style="padding:10px;"  action="{{ route('survey.store') }}" method="POST">
    @csrf
  
<div class="row">
    <div class="col-xs-8 col-sm-8 col-md-8">
        <div class="form-group">
            <p for="">Title</p>
            <input type="text" name="title" class="form-control" placeholder="Survey title" required>
        </div>
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4">
<div class="form-group">
    <p for="">Status</p>

        <select name = "status" class="form-control" required>
        <option value="select_status" disabled selected>Click to Select Status</option>

            <option value = "active" >Active </option>
            <option value = "closed">Closed</option>
            <option value = "pending">Pending</option>
         </select>
</div>
    </div>

</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <p for="">Description</p>
            <textarea cols="30" rows="3" class="form-control"  name="description" placeholder="Survey description" required></textarea>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-2 col-sm-2 col-md-2">
        <div class="form-group">
            <button type="submit" class="btn btn-success text-sm">Submit Survey</button>
            
        </div>
    </div>
    <div class="col-xs-8 col-sm-8 col-md-8"></div>
    <div class="col-xs-2 col-sm-2 col-md-2">
        <div class="form-group">
            <a href="#new_survey" data-toggle="collapse" class="btn btn-danger btn-sm">Close</a>

        </div> 
    </div>
       
    </div>
</div>


   
</form>
        </div>
    </div>

</div>
<!--/add survey create modal-->
    <div class="row">

   
    <div class="col-sm-12 ">

<div class="card">
<table class="table table-borderless" >
<thead class="thead-light">
<tr>
            <th>#</th>
            <th style="width: 50%">TITLE</th>
            <th>STATUS</th>
            <th>QUESTIONS/RESPONSES</th>
            <th>ACTION</th>
        </tr>
</thead>
<tbody>
@foreach ($survey as $survey)
        <tr>
        <td>{{ $survey->id }}</td>
            <td>{{ $survey->title }}</td>
            <td>
            <span class="badge badge-info">{{ $survey->status }}</span>

            </td>
            <td>
                <a  href="/question?id={{$survey->id}}">Questions<span class="badge badge-pill badge-success ml-2">{{$survey->questions->count()}}</span></a>
                <a href="/response?id={{$survey->id}}">Responses<span class="badge badge-pill badge-success ml-2">{{$survey->responses->count()}}</span></a>
            </td>
            <td>
                <form action="{{ route('survey.destroy',$survey->id) }}" method="POST">
   
                    <!-- <a class="btn btn-info" href="{{route('survey.show',$survey->id)}}">Show Survey</a> -->
    
                    <a class="btn btn-success btn-sm" href="#edit_survey{{$survey->id}}" data-toggle="collapse" >Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>

                </form>
            </td>
            <!-- <td><a class="btn btn-info" href="{{route('question.create',$survey->id)}}">Add Question</a></td> -->
        </tr>


<!--add survey edit modal-->
<div class="collapse" id="edit_survey{{$survey->id}}" role="dialog" >
    <div class="">
        <div class="">

<form  action="{{ route('survey.update',$survey->id) }}"  method="POST">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="col-xs-12 col-sm-12 col-md-12 px-4">
                <div class="form-group">
                    <label for="">Title</label>
                    <input  type="text" name="title" value="{{$survey->title}}" class="form-control" placeholder="Survey title">
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="col-xs-12 col-sm-12 col-md-12 px-4">
                <label for="">Status</label>
        
                    <select class="form-control" name="status">
                    <option selected>Select Status</option>
                    <option value="active" {{($survey->status == 'active') ? 'Selected' : ''}}>Active</option>
                    <option value="closed" {{($survey->status == 'closed') ? 'Selected' : ''}}>Closed</option>
                    <option value="pending" {{($survey->status == 'pending') ? 'Selected' : ''}}>Pending</option>
        
                    </select>
        
                </div>
        </div>

    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 px-4">
                <div class="form-group">
                    <label for="">Description</label>
                    <textarea cols="30" rows="2" class="form-control"  name="description" placeholder="Survey description">{{ $survey->description }}</textarea>
                </div>
            
        </div>

    </div>
    <div class="row">
        <div class="col-xs-2 col-sm-2 col-md-2">
            <div class="form-group">
            
                <button type="submit" class="btn btn-success ml-4">Submit Survey</button>
        
                </div>
        </div>
        <div class="col-xs-8 col-sm-8 col-md-8"></div>
        <div class="col-xs-2 col-sm-2 col-md-2">
            <a href="#edit_survey{{$survey->id}}" data-toggle="collapse" class="btn btn-danger btn-sm px-4">Close</a>

        </div>

    </div>


   
   
</form>

        </div>
    </div>
</div>
<!--/add survey edit modal-->

        @endforeach

</tbody>

    </table>
     
<div class="card-footer"></div>
</div>

</div>
  
</div> 

</div>


@stop
