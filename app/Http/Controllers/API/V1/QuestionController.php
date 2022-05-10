<?php

namespace App\Http\Controllers\API\V1;

use App\Models\Question;
use App\Models\Survey;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\QuestionResource;
use App\Http\Resources\V1\QuestionCollection;
use App\Filters\V1\QuestionsFilter;
use App\Http\Requests\V1\StoreQuestionRequest;
use App\Http\Requests\V1\UpdateQuestionRequest;


class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //

        $filter=new QuestionsFilter();
        
        $queryItems=$filter->transform($request);  

        if(count($queryItems)==0){
            return new QuestionCollection(Question::paginate());

        }else{
                $questions=Question::where($queryItems)->paginate();
            return new QuestionCollection($questions->appends($request->query()));

        }        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQuestionRequest $request)
    {
        //
        return new QuestionResource(Question::create($request->all()));

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
        return new QuestionResource($question);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question){}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateQuestionRequest $request,Question $question)
    {
        
        $question->update($request->all()); 

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {

        $question->delete();
        return response(['message' => 'Deleted']);

    }
}
