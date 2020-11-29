<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Resources\Survey as SurveyResource;

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return SurveyResource::collection(Survey::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $survey = Survey::create(['question'=> $request->question]);
        return response()->json(['data' => new SurveyResource($survey),
        'message'=>'Successully added new survey',
        'status'=> Response::HTTP_CREATED]);        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Survey  $survey
     * @return \Illuminate\Http\Response
     */
    public function show(Survey $survey)
    {
        return new SurveyResource($survey);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Survey  $survey
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Survey $survey)
    {
        $data = [];
        if (isset($request->question)) {
            $data['question']= $request->question;
        }
        if (isset($request->status)){
            $data['status']= $request->status;
        }
        $survey->update($data);
        return response()->json([
            'data'=> new SurveyResource($survey),
            'message'=> 'Survey Successfully Updated',
            'status' => Response::HTTP_ACCEPTED]);          
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Survey  $survey
     * @return \Illuminate\Http\Response
     */
    public function destroy(Survey $survey)
    {
        $survey->delete();
        return response()->json([
            'message'=> 'Successfully Deleted',
            'status' => Response::HTTP_NO_CONTENT]);            
    }
}
