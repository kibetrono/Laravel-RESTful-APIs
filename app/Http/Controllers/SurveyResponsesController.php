<?php

namespace App\Http\Controllers;

use App\Models\{SurveyResponses,Survey};
use Illuminate\Http\Request;

class SurveyResponsesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Survey $survey)
    {
        //
        // $query       = SurveyResponses::with('question')->where('survey_id', $survey->id);
        $id=request()->id;

        $surveys=Survey::where('id',$id)->get();

            // dd($surveys);

        // $responses=SurveyResponses::with('question')->where('survey_id',$survey->id)->get();

        return view('Responses.index',compact('surveys'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SurveyResponses  $surveyResponses
     * @return \Illuminate\Http\Response
     */
    public function show(SurveyResponses $surveyResponses)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SurveyResponses  $surveyResponses
     * @return \Illuminate\Http\Response
     */
    public function edit(SurveyResponses $surveyResponses)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SurveyResponses  $surveyResponses
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SurveyResponses $surveyResponses)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SurveyResponses  $surveyResponses
     * @return \Illuminate\Http\Response
     */
    public function destroy(SurveyResponses $surveyResponses)
    {
        //
    }
}
