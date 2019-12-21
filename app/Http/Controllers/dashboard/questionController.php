<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
