<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Resources\Unit as UnitResource;


class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return UnitResource::collection(Unit::all());
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $unit = Unit::create([
            'unit'=>$request->unit,
            'owner'=>$request->owner,
            'email'=>$request->email,
        ]);
        return response()->json(['data' => new UnitResource($unit),
        'message'=>'Successully added new unit',
        'status'=> Response::HTTP_CREATED]);             
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function show(Unit $unit)
    {
        return new UnitResource($unit);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unit $unit)
    {
        $unit->update([
            'unit'=>$request->unit,
            'owner'=>$request->owner,
            'email'=>$request->email
        ]);
        return response()->json([
            'data'=> new UnitResource($unit),
            'message'=> 'Unit Successfully Updated',
            'status' => Response::HTTP_ACCEPTED]);           
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unit $unit)
    {
        $unit->delete();
        return response()->json([
            'message'=> 'Successfully Deleted',
            'status' => Response::HTTP_NO_CONTENT]);       }
}
