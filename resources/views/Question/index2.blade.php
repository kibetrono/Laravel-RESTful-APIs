@extends('home')

 
@section('title')
<div class="container-fluid">
   
<div class="row">
    <div class="col-md-8 text-left">
        <h6>Add Questions To Survey</h6>
    <h5><i class="fa fa-question"></i> Konza Complex</h5>
    <h6>This survey is meant to learn how Konza Complex was contructed</h6>

    </div>
    <div class="col-md-2">

            <form class="input-group">
                <input type="text" class="form-control" placeholder="Search your survey"  value="">
                <div class="input-group-append">
                    <button type="submit" class="input-group-text">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </form>
       
    </div>
    <div class="col-md-2">
    <a class="btn btn-success py-2 px-5 text-sm" href="#new_question" data-toggle="collapse"> Add Question</a>

    </div>
</div>
@stop

@section('content')

<div class="container-fluid">
    <div class="row mt-4">

    <div class="col-md-12">

        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert">
            <i class="fa fa-times"></i>
        </button>
        <strong>{{ $message }}</strong> 
    </div>


        @elseif($message = Session::get('danger'))

        <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert">
            <i class="fa fa-times"></i>
        </button>
        <strong>{{ $message }}</strong>
    </div>
      
    @endif
    
        </div>    
    </div>




<!--add question modal-->
<div class="collapse" id="new_question" role=dialog>
    <div>
        <div class="">
       
        <form action="{{ route('question.store') }}" method="POST" style="border:1px solid #ddd;padding:10px">
    @csrf

      <!-- select  survey -->
            <!-- <div class="col-xs-12 col-sm-12 col-md-12 ">
            <div class="form-group">
        <label for="">Select Survey</label>

        <select name = "survey_main" class="form-control">
        <option value="select_status" disabled selected>Click to Select Survey</option>
                @foreach($surveys as $survey)

                <option value = "{{$survey->id}}">{{$survey->title}}</option>

                @endforeach
         </select>
        </div>
        </div> -->
            <!-- /select survey -->


            <!-- hidden input -->
        

            <input type="hidden" name="survey_main" value="{{request()->id}}">
       
      
            <!-- /hidden input -->
<div class="row">
    <div class="col-xs-4 col-sm-4 col-md-4">
        <div class="form-group">
            <label for="">Question Type</label>
            <select  name="type" class="form-control question-type">
                <option value="select_type" disabled selected>Click to Select Type</option>
                <option value="rating">Rating</option>
                <option value="choice"> Choice list</option>
                <option value="select">Select</option>
                <option value="text">Text</option>
            </select>
            <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <div id='datafields' name='rate[]'>

                </div>
            </div>

            <!-------------- mytextchoices--------------------->
        <div class="col-xs-12 col-sm-12 col-md-12 more_choices" style="display:none">
        <div class="form-group mt-2">
        <label for="">Choice Type</label>
        <div class="input_fields_wrap">
            <div class="row">
            <div class="col-md-10">
            <input type="text" class="form-control mb-3 "  name="mytextchoices[]" placeholder="Add more choices">

            </div>
            <div class="col-md-1 add_field_button"><i class=" btn btn-success fa fa-plus"></i></div>
            <div class="col-md-1"></div>
            </div>
            </div>

            </div>
            </div>
        <!-------------- /mytextchoices--------------------->

        <!-------------- select--------------------->
        <div class="col-xs-12 col-sm-12 col-md-12 more_selections" style="display:none">
            <div class="form-group mt-2">
            <label for="">Select Type</label>
            <div class="input_fields_select_wrap">
                <div class="row">
                <div class="col-md-10">
                <input type="text" class="form-control mb-3 "  name="select[]" placeholder="Option Value">
    
                </div>
                <div class="col-md-1 add_select_field_button"><i class=" btn btn-success fa fa-plus"></i></div>
                <div class="col-md-1"></div>
                </div>
                </div>
    
                </div>
                </div>
            <!-------------- /select--------------------->
            </div>
           
            
        </div>
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4">
        <div class="form-group">
            <label for="">Status</label>
    
            <select name = "status" class="form-control">
            <option value="select_status" disabled selected>Click to Select status</option>
    
                <option value = "active" >Active </option>
                <option value = "closed">Closed</option>
             </select>
            </div>
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4">
        <div class="form-group">
            <label for="">is required?</label><br>
                <select name="required" id="" class="form-control">
                    <option value="select_required" disabled selected>Click to Select Options</option>
                    <option value = "yes" >Yes </option>
                    <option value = "no">No</option>
                </select>
            
            </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <label for="" >Title</label>
            <input type="text" class="form-control" name="title" placeholder="Question Title">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <label for="" >Description</label><br>
            <textarea style="border:1px solid #ddd" name="description" id="" cols="191" rows="2" placeholder="Description"></textarea>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-2 col-sm-2 col-md-2">
        <div class="form-group">
        <button type="submit" class="btn btn-success  text-sm">Submit Question</button>
        </div>
    </div>
    <div class="col-xs-8 col-sm-8 col-md-8"></div>
    <div class="col-xs-2 col-sm-2 col-md-2">
        <div class="form-group">
            <a href="#new_question" data-toggle="collapse" class="btn btn-danger btn-sm">Close</a>
        </div>
    </div>
</div>

</form>

        </div>
    </div>

</div>
</div>
<!--/add question modal-->

    <div class="row">
    <div class="col-sm-12 ">

<div class="card">
<table class="table table-borderless" >
<thead class="thead-light">
<tr>
            <th>#</th>
            <th style="width: 50%">QUESTION</th>
            <th>TYPE</th>
            <th>STATUS</th>
            <th>RESPONSES</th>
            <th>ACTIONS</th>
        </tr>
</thead>
<tbody>

@foreach ($question as $question)
        <tr>
        <td>{{ $question->id }}</td>
        <td>{{ $question->title }}</td>
        <td>{{ $question->type }}</td>
        <td><span class="badge badge-info">{{ $question->status }}</span></td>
        <td><a href="/response?id={{$question->id}}">Responses<span class="badge badge-pill badge-success ml-2">{{$question->responses->count()}}</span></a></td>
        <td>
                <form action="{{ route('question.destroy',$question->id) }}" method="POST">
   
                    <!-- <a class="btn btn-info" href="{{route('question.show',$question->id)}}">Show Question</a> -->
    
                    <a  href="{{"#edit_question$question->id"}}" data-toggle="collapse">Edit</a>
                    
                    @csrf
                    @method('DELETE')
                   <input type="submit" class="btn btn-danger btn-sm ml-4" value="Delete">
                    <!-- <button type="submit" class="btn btn-danger btn-sm">Delete</button> -->
                </form>
            </td>
          
          
         
        </tr>
<!--edit question modal-->
<div class="collapse" id="edit_question{{$question->id}}" role="dialog">
    

    <form   action="{{ route('question.update',$question->id) }}" method="POST">
    @csrf
    @method('PUT')

<div class="row">
<div class="col-xs-3 col-sm-3 col-md-3">
    <div class="col-xs-12 col-sm-12 col-md-12" >
        <div class="form-group" >
            <label for="">Question Type</label>
                <select  id="my_type" name="type" class="form-control question-type">
                    <option selected>Select Question</option>
                    <option value="rating" {{($question->type == 'rating') ? 'Selected' : ''}}>Rating</option>
                    <option value="choice" {{($question->type == 'choice') ? 'Selected' : ''}}>Choice list</option>
                    <option value="select" {{($question->type == 'select') ? 'Selected' : ''}}> Select</option>
                    <option value="text" {{($question->type == 'text') ? 'Selected' : ''}}>Text</option>
                </select>    
            </div>
        </div>
</div>
<div class="col-xs-3 col-sm-3 col-md-3">
    <div class="col-xs-12 col-sm-12 col-md-12" id='datafieldsedit'>
        <div class="form-group">
            <label for="">Rating</label>
            @foreach(explode(',', $question->rate) as $info)

            <input type="number" name="rate[]" value="{{$info}}" class="form-control" placeholder="Question rate">

            @endforeach
       

        </div>
    </div>
</div>
<div class="col-xs-3 col-sm-3 col-md-3">
    <!--multichoice-->
    <div class="col-xs-12 col-sm-12 col-md-12 more_choices">
        <div class="form-group">
            <label for="">Choice Type</label>       
            <div class="input_fields_wrap">
                @foreach(explode(',', $question->mytextchoices) as $info)
                    <div class="row">
                        <div class="col-md-10">
                            <input type="text" name="mytextchoices[]" value="{{$info}}" class="form-control" placeholder="Question choice">
                        </div>
                        <div class="col-md-1">
                            <div class="col-md-1 add_field_button"><i class=" btn btn-success fa fa-plus"></i></div>
                        </div>
                        <div class="col-md-1"></div>
                    </div>  `                 
                @endforeach        
            </div>
        </div>
    </div>
        <!--/multichoice-->
</div>
<div class="col-xs-3 col-sm-3 col-md-3">
    <!--select-->
    <div class="col-xs-12 col-sm-12 col-md-12 more_selections">
        <div class="form-group">
            <label for="">Select Type</label>       
            <div class="input_fields_select_wrap">
                @foreach(explode(',', $question->select) as $info)
                    <div class="row">
                        <div class="col-md-10">
                            <input type="text" name="select[]" value="{{$info}}" class="form-control" placeholder="Question select type value">
                        </div>
                        <div class="col-md-1">
                            <div class="col-md-1 add_select_field_button"><i class=" btn btn-success fa fa-plus"></i></div>
                        </div>
                        <div class="col-md-1"></div>
                    </div>  `                 
                @endforeach        
            </div>
        </div>
    </div>
        <!--/select-->
</div>

</div>

<div class="row">
<div class="col-xs-4 col-sm-4 col-md-4">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="">Title</label>
                <input type="text" name="title" value="{{$question->title}}" class="form-control" placeholder="Question title">
            </div>
        </div>
    
   
</div>
<div class="col-xs-4 col-sm-4 col-md-4">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <label for="">is required?</label><br>
            <select name="required" id="" class="form-control">
            <option value="select_required" disabled selected>Click to Select Options</option>
            <option value = "yes" {{($question->required == 'yes') ? 'Selected': ''}}>Yes </option>
            <option value = "no" {{($question->required == 'no') ? 'Selected': ''}}>No</option>
        </select>

        </div>
    </div>
</div>
<div class="col-xs-4 col-sm-4 col-md-4">
    <div class="col-xs-12 col-sm-12 col-md-12 ">
        <div class="form-group">
        <label for="">Status</label>  
    <select class="form-control" name="status">
        <option selected>Select Status</option>
        <option value="active" {{($question->status == 'active') ? 'Selected' : ''}}>Active</option>
        <option value="closed" {{($question->status == 'closed') ? 'Selected' : ''}}>Closed</option>  
    </select>
</div> 

</div>
</div>

</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 px-4">
            <div class="form-group">
                <label for="">Description</label><br>
                <textarea type="text" name="description"  cols="192" style="border: 1px solid #ddd" rows="2">{{$question->description}}</textarea>
                {{-- <input type="text" name="description" value="{{$question->description}}" class="form-control" placeholder="Question description"> --}}
            </div>
    
    </div>
</div>

<div class="row">
    <div class="col-xs-2 col-sm-2 col-md-2">
        <div class="form-group">
        <button type="submit" class="btn btn-success ml-3  btn-sm">Update Question</button>
    </div>
    </div>
    <div class="col-xs-8 col-sm-8 col-md-8"></div>
    <div class="col-xs-2 col-sm-2 col-md-2">
        <div class="form-group">
            <a href="#edit_question{{$question->id}}" data-toggle="collapse" class="btn btn-danger btn-sm px-3">Close</a> 
    
        </div>
    </div>
    
    </div>
</form>
</div>

<!--/edit question modal-->


        @endforeach

</tbody>

    </table>
     
<div class="card-footer"></div>


</div>

</div>  
</div> 

</div>
   
@stop













