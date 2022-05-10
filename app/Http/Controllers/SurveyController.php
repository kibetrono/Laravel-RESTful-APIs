<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Survey;
use App\Models\Question;
use Illuminate\Support\Facades\DB;

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // return view('create_survey');
       
        $total_users = DB::table('users')->get();
        $total_quiz = DB::table('questions')->get();
        // $total_quiz = Question::all();
        // count($total_users)
        $survey=Survey::latest()->paginate(10);

        return view('Survey.index',compact('survey','total_quiz','total_users'));

      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Survey.create_survey');

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
            'title' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);
    
        Survey::create($request->all());
        
        return redirect()->route('survey.index')->with('success','Survey successfully created .');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Survey $survey)
    {
        //
        return view('Survey.display',compact('survey'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Survey $survey)
    {
        //
        return view('Survey.edit_survey',compact('survey'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Survey $survey)
    {
        //

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);
        
        $survey->update($request->all());
    
        return redirect()->route('survey.index')->with('success','Survey successfully updated .');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Survey $survey )
    {
        //
        $survey->delete();
    
        return redirect()->route('survey.index')->with('danger','Survey successfully deleted .');

    }
}

