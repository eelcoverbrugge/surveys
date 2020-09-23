<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Questionnaire;
use App\Survey;
use App\Answer;

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
        $questionnaires         = auth()->user()->questionnaires;

        $totalQuestionnaires    = count(Questionnaire::all());
        $totalSurveys           = count(Survey::all());
        $totalAnswers            = count(Answer::all());

        return view('home', compact('questionnaires', 'totalQuestionnaires', 'totalSurveys', 'totalAnswers'));
    }
}
