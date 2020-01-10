<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\question_answer;
use App\question;

class questionController extends Controller
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


         // $questions = question::leftJoin('question_answers', 'questions.id', 'question_answers.question_id')->select('questions.*', 'questions.id as qid' , 'question_answers.*',  'question_answers.id as aid')->get();
        
        $questions = question::all();

        foreach($questions as $key => $question){
            $questions[$key]->first_answer     = $question->answers->first()->first_answer;
            $questions[$key]->second_answer    = $question->answers->first()->second_answer;
            $questions[$key]->third_answer     = $question->answers->first()->third_answer;
            $questions[$key]->fourth_answer    = $question->answers->first()->fourth_answer;
            $questions[$key]->correct_answer   = $question->answers->first()->correct_answer;
        }

        // return $questions;

        return view('question')->with(['questions' => $questions]);
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


        
        if(userController::checklogin() != 1){
            return redirect('/login');
        }
        
        $validator = Validator::make($request->all(), [
            'question'          => 'required|min:3|max:255',
            'first_answer'      => 'required|min:1|max:15',
            'second_answer'     => 'required|min:1|max:15',
            'third_answer'      => 'required|min:1|max:15',
            'fourth_answer'     => 'required|min:1|max:15',
            'question_level'    => 'required|min:1|max:5|numeric',
            'question_type'     => 'required|min:1|max:2|numeric',
            'correct_answer'    => 'required|min:1|max:4|numeric',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        }



        $question = question::create([
            'group_id'  => request()->question_type,
            'question'  => request()->question,
            'level'     => request()->question_level,
            'is_active' => 1,
        ]);

        $question_answer = question_answer::create([
            'question_id'       => $question->id,
            'first_answer'      => request()->first_answer,
            'second_answer'     => request()->second_answer,
            'third_answer'      => request()->third_answer,
            'fourth_answer'     => request()->fourth_answer,
            'correct_answer'    => request()->correct_answer,
        ]);

        return $this->index();

    }
}
