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
        $questions              = auth()->user()->userQuestions;
        $surveys                = auth()->user()->userSurveys;
        
        $totalQuestionnaires    = count($questionnaires);
        $totalQuestions         = count($questions);
        $totalSurveys           = count($surveys);

        return view('home', compact('questionnaires', 'totalQuestionnaires', 'totalQuestions', 'totalSurveys'));
    }
}
