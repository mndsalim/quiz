<?php

namespace App\Http\Controllers\dashboard;

use App\user;
use App\studentQuiz;
use App\quiz_answer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class studentController extends Controller
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



        $students = user::where('user_type', 0)->orderBy('id', 'desc')->get();
        
        foreach($students as $key => $student){ $students[$key]->quiz = $student->quiz->count();}

        return view('student')->with(['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function reset(user $student)
    {
        $quizzes = studentQuiz::where('user_id', $student->id)->get();

        foreach ($quizzes as $quiz) {
            
            quiz_answer::where('quiz_id', $quiz->id)->delete();
        }
        studentQuiz::where('user_id', $student->id)->delete();
        
        return redirect()->back();
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
            'user_name'      => 'required|min:3|max:255',
            // 'email'     => 'nullable|unique:users|email',
            'user_phone'     => 'required|min:10|max:15',
            // 'password'  => 'nullable|min:3|max:120',
            'user_address'   => 'nullable',
            // 'birthdate' => 'nullable',
            // 'user_type' => 'required|min:0|max:1|numeric',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        }


        $student = user::create([
            'name'      => request()->user_name,
            'phone'     => request()->user_phone,
            'address'   => request()->user_address,
            'user_type' => 0,
        ]);

        $student->remember_token = sha1($student->id);
        $student->save();


        // return $this->index();
        return view('qrCode')->with('student', $student);
    }
}
