<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\studentQuiz;

class quizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        
        if(userController::checklogin() != 1){
            return redirect('/login');
        }


        $quizzes = studentQuiz::where('finishing_date', '<>', null)->get();
        
        foreach($quizzes as $key => $quiz){ $quizzes[$key]->answer = $quiz->answer->count() . ' / ' . $quiz->answer->where('is_correct', 1)->count();}

        return view('quiz')->with(['quizzes' => $quizzes]);
    }

}
