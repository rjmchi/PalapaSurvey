<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Unit;
use App\Models\Survey;
use App\Models\Answer;

class OwnerResponseController extends Controller
{
    public function index($unit, $uuid) {
        $data['unit']=Unit::where('unit', $unit)->first();
        $data['answer'] = Answer::where('uuid', $uuid)->where('unit_id', $data['unit']->id)->first();
        
        return view('SurveyAnswer')->with($data);
    }
}
