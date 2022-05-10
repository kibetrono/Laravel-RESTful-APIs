<?php

namespace App\Http\Controllers\API\V1;
use Illuminate\Http\Request;
use App\Models\Survey;
use App\Models\SurveyResponses;
use App\Models\Question;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\SurveyResource;
use App\Http\Resources\V1\SurveyCollection;
use App\Filters\V1\SurveysFilter;
use App\Http\Requests\V1\StoreSurveyRequest;
use App\Http\Requests\V1\UpdateSurveyRequest;


class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $data = array();
        //fetch all surveys that are active
        $fetchsurveys = Survey::all();
        if ($request->isMethod('POST')) {
            return response()->json([
                'code'    => 500,
                'message' => 'INVALID METHOD INVOCATION',
            ], 500);
        }else{
            
        foreach ($fetchsurveys as $value) {
            
            array_push(
                $data,
                [
                    'survey_id'=>$value->id,
            'title'=>$value->title,
            'description'=>$value->description,
            'created_on'=>$value->created_at,
            'number_of_questions'=> $value->questions->count(),
            'status'=>$value->status
                ]
            );
        }

        return response()->json(['Surveys',$data]);
     
    }

    }
    
    public function postResponse(Request $request)
    {
        if ($request->isMethod('GET')) {
            return response()->json([
                'code'    => 500,
                'message' => 'INVALID METHOD INVOCATION',
            ], 500);
        }

        //CAPTURE THE POST request.. First validate the important request parameters

        $captureRequest = json_decode($request->getContent());


        // dd($captureRequest->value);

        //Perform validation
        if (empty($captureRequest->survey_id)) {
            return response()->json(['code' => 500, 'message' => 'Survey ID Not Specified'], 500);
        }

        if (empty($captureRequest->user_id)) {
            return response()->json([
                'code' => 500, 'message' => 'User ID Not Specified',
            ], 500);
        }

        if (empty($captureRequest->survey_id)) {
            return response()->json(['code' => 500, 'message' => 'Survey ID Not Specified'], 500);
        }

        //The first thing is to extract the survey type
        $survey = Survey::find($captureRequest->survey_id);

        if (is_null($survey)) {
            return response()->json([
                'code'    => 500,
                'message' => 'Invalid Survey ID/Survey ID not Found',
            ], 500);
        }

        $user = $request->user();
        // dd($user->id);
        //Next thing is to check if the user has already completed the survey
        if ($user) {
            $hasResponse = SurveyResponses::where('user_id', $user->id)
                ->where('survey_id', $captureRequest->survey_id)
                ->first();

            if ($hasResponse) {
                return response()->json([
                    'code'    => 500,
                    'message' => 'Sorry. You Already participated in the Survey.',
                ], 500);
            } else {



                $create=SurveyResponses::create([
                    'survey_id'   => $captureRequest->survey_id,
                    'user_id'     => $user->id,
                    'question_id' => $captureRequest->question_id,
                    'value'       => $captureRequest->value,
                    'status'      => 1,

                ]);


                return response()->json([
                    'code'    => 200,
                    'message' => 'Success.Thank you for your feedback.',
                    'data'    => $create,
                ], 200);
            }
        } else {
            return response()->json([
                'code'    => 500,
                'message' => 'Invalid User ID',
            ], 500);
        }
    }
 
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSurveyRequest $request)
    {
        //
        return new SurveyResource(Survey::create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Survey $survey,Request $request)
    {


       if ($request->isMethod("POST")) {

            return response()->json([
                'code'    => 500,
                'message' => 'INVALID METHOD INVOCATION',
            ], 500);
        } else {

            $survey= new SurveyResource($survey);
    
            return response()-> json(['Questions',$survey]);
        }
        
        

        // if ($request->isMethod("POST")) {

        //     return response()->json([
        //         'code'    => 500,
        //         'message' => 'INVALID METHOD INVOCATION',
        //     ], 500);
        // } else {
        //     // $fetchsurveysByID = Survey::query()
        //     // ->with('rates')->select('id','title')->get()->find($id);

        //     // $user=Survey::find($id);
        //     // $user_products = $user->questions()->select('type')->get();

        //     $fetchsurveysByID = Survey::query()
        //     ->with(['questions' => function ($query) {
        //         $query->select('survey_id','type','rate');
                
        //     }])->find($id);

        //     if (empty($fetchsurveysByID)) {

        //         return response()->json([

        //             'code'    => 500,
        //             'message' => "Invalid Survey ID {$id}",

        //         ], 500);
        //     }

        //     if($fetchsurveysByID->type == 'rating'){
                    
                
        //         explode(',', $fetchsurveysByID->rate); 
                
        //     }

        // elseif($fetchsurveysByID->type == "choice"){


        // }else{

        //     return response()->json($fetchsurveysByID);
        // }
          

        // }
    
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSurveyRequest $request,Survey $survey)
    {
        //
        $survey->update($request->all()); 


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Survey $survey)
    {
        //

        $survey->delete();
        return response(['message' => 'Deleted']);


    }

      public function search($name)
    {
        return Product::where('name', 'like', '%'.$name.'%')->get();
    }
}

