<?php

namespace App\Http\Controllers\dashboard;

use App\user;
use App\studentQuiz;
use App\question;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class homeController extends Controller
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
        
        return view('welcome')->with([
            'students'          => user::where('user_type', 0)->get(),
            'admins'            => user::where('user_type', 1)->get(),
            'questions'         => question::where('is_active', 1)->get(),
            'multiplications'   => studentQuiz::where('group_type', 1)->get(),
            'divisions'         => studentQuiz::where('group_type', 2)->get(),
            'quizzes'           => studentQuiz::all(),
        ]);


    }

}
