<?php

namespace App\Http\Controllers\API\V1;

use App\Models\{SurveyResponses,Survey};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\SurveyResponseResource;
use App\Http\Resources\V1\SurveyResponseCollection;


class SurveyResponsesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Survey $survey_id, Request $request)
    {

       
        $data = array();
        //fetch all surveys that are active
        $fetchsurveys = Survey::with('responses')->find($survey_id);
        // dd($fetchsurveys);
        $data['survey'] = $fetchsurveys;

        return response()->json($data);

        
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
        //CAPTURE THE POST request.. First validate the important request parameters
        $captureRequest = json_decode($request->getContent());

        //Perform validation
        if (empty($captureRequest->survey_id)) {
            return response()->json(['code' => 500, 'message' => 'Survey ID Not Specified'], 500);
        }

        if (empty($captureRequest->user_id)) {
            return response()->json([
                'code' => 500, 'message' => 'User ID Not Specified'
            ], 500);
        }

        if (empty($captureRequest->survey_id)) {
            return response()->json(['code' => 500, 'message' => 'Survey ID Not Specified'], 500);
        }

        //The first thing is to extract the survey type
        $extractSurveyType = SurveyMetaData::query()->where('survey_id', $captureRequest->survey_id)->first();

        if (is_null($extractSurveyType)) {
            return response()->json([
                'code'      => 500,
                'message'   => 'Invalid Survey ID/Survey ID not Found'
            ], 500);
        }

        //Next thing is to check if the user has already completed the survey
        $verifyUserSurveyResponse = SurveyResponses::query()->where('user_id', $captureRequest->user_id)->where('survey_id', $captureRequest->survey_id)->first();

        //Respond that the user has filled the survey this is an error..
        if (!is_null($verifyUserSurveyResponse)) {
            return response()->json([
                'code'      => 500,
                'message'   => 'Sorry.You Already participated in the Survey.'
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SurveyResponses  $surveyResponses
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        //
       
        // $allResponses=new SurveyResponseResource($surveyResponses);

        // return response()->json(['Responses',$allResponses]);
        

            if ($request->isMethod("POST")) {
    
                return response()->json([
                    'code'    => 500,
                    'message' => 'INVALID METHOD INVOCATION',
                ], 500);
            } else {
                
                $fetchsurveyResponsesByID = SurveyResponses::select('*')->find($id);
    
                if (empty($fetchsurveyResponsesByID)) {
    
                    return response()->json([
    
                        'code'    => 500,
                        'message' => "Invalid Survey ID {$id}",
    
                    ], 500);
                }
    
                return response()->json($fetchsurveyResponsesByID);
            }
        

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
