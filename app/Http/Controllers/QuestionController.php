<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Survey;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $surveys=Survey::all();

        // $question=Question::latest()->paginate(15);
        $id=request()->id;
        
        $question=Question::where('survey_id',$id)->get();


        return view("Question.index",compact('question','surveys'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $surveys=Survey::all();
        return view('Question.create_question',compact('surveys'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([

            'type' => 'required',
            'rate' => 'nullable',
            'mytextchoices' => 'nullable',
            'title' => 'required',
            'description'=>'required',
            'status' => 'required',
            'required' => 'required',
            'survey_main'=>'required',

        ]);
    //   dd($request->all());
        $quiz = new Question;
        $quiz->type = $request->input('type');
        // $quiz->rate = implode(',', $request->input('rate'));

        if($request->type=='rating'){
            $quiz->rate = implode(',', $request->input('rate'));
        }else{
            $quiz->rate = null;
        }
        if($request->type=='choice'){
            $quiz->mytextchoices = implode(',', $request->input('mytextchoices'));
        }else{
            $quiz->mytextchoices = null;
        }
        if($request->type=='select'){
            $quiz->select = implode(',', $request->input('select'));
        }else{
            $quiz->select = null;
        }
        // $quiz->mytextchoices = implode(',', $request->input('mytextchoices'));
        $quiz->title = $request->input('title');
        $quiz->description = $request->input('description');
        $quiz->status = $request->input('status');
        $quiz->required = $request->input('required');
        $quiz->survey_id = $request->input('survey_main');
      
        $quiz->save();

        // Question::create($request->all());

        return redirect()->back()->with('success',"Question successfully created");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
        return view('Question.display_question',compact('question'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        //
        return view('Question.edit_question',compact('question'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        // dd($request->all());
        
        $request->validate([
            'type' => 'required',
            'rate' => 'nullable',
            'mytextchoices' => 'nullable',
            'select' => 'nullable',
            'title' => 'required',
            'description' => 'required',
            'status' => 'required',
            'required' => 'required',
        ]);
        // dd($question);
            // dd($request->all());
        // $quiz = new Question;

        $quiz=Question::findOrFail($id);
        $quiz->type = $request->input('type');
        // $quiz->rate = $request->input('rate');
        if($request->type=='rating'){
            $quiz->rate = implode(',', $request->input('rate'));
        }else{
            $quiz->rate = null;
        }
        if($request->type=='choice'){
            $quiz->mytextchoices = implode(',', $request->input('mytextchoices'));
        }else{
            $quiz->mytextchoices = null;
        }
        if($request->type=='select'){
            $quiz->select = implode(',', $request->input('select'));
        }else{
            $quiz->select = null;
        }

        $quiz->title = $request->input('title');
        $quiz->description = $request->input('description');
        $quiz->status = $request->input('status');
        $quiz->required = $request->input('required');

        $quiz->save();

        // dd($quiz);

        // $quiz->update($request->all()); 
        
        return redirect()->back()->with('success','Question successfully updated .');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        //
        $question->delete();

        return redirect()->back()->with("danger","Question successfully deleted");
    }
}
