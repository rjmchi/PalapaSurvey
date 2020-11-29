<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\Survey as SurveyMail;
use App\Models\Unit;
use App\Models\Survey;
use App\Models\Answer;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function create() {
        return view('CreateSurvey');
    }

    public function mail() {
        mail::to('robert@rjmchicago.com')->send(new SurveyMail);
        return 'sent';
    }
}
