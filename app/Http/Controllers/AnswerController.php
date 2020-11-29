<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Resources\Answer as AnswerResource;
use Illuminate\Support\Str;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return AnswerResource::collection(Answer::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $uuid = Str::uuid();
        $answer = Answer::create(['uuid'=> $uuid, 'unit_id'=>$request->unit_id, 'survey_id'=>$request->survey_id]);
        return response()->json(['data' => new AnswerResource($answer),
        'message'=>'Successully added new answer',
        'status'=> Response::HTTP_CREATED]);               
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function show(Answer $answer)
    {
        return new AnswerResource($answer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Answer $answer)
    {
        $answer->update(['answer'=>$request->answer]);
        return response()->json([
            'data'=> new AnswerResource($answer),
            'message'=> 'Answer Successfully Updated',
            'status' => Response::HTTP_ACCEPTED]);          
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Answer $answer)
    {
        $answer->delete();
        return response()->json([
            'message'=> 'Successfully Deleted',
            'status' => Response::HTTP_NO_CONTENT]);          
    }
}
