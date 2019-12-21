<?php

namespace App\Http\Controllers;

use App\user;
use App\studentQuiz;
use App\quiz_answer;
use App\question;
use App\question_answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\question\questionResource;
use App\Http\Resources\quiz\quizResultResource;

class StudentQuizController extends Controller
{    
    public $user ;

    public function __construct()
    {
        $this->user = user::find(request()->header('user_id'));

        if(!isset($this->user->id)){
            return abort_if(['message' => 'User UnAuthorized APP'],401);
        }

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {



        $validator = Validator::make(request()->all(), [
            'group_type' => 'required|min:1|max:2|numeric',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        }




        $quiz = $this->user->quiz->where('group_type', request()->group_type)->where('finishing_date',null)->first();

        if(!isset($quiz->id)){
            $quiz = studentQuiz::create(['user_id' => $this->user->id, 'group_type' => request()->group_type, 'starting_date' => date('Y-m-d H:i:s')]);
        }

        


        return $this->show($quiz);


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

        
        $validator = Validator::make(request()->all(), [
            'answer_id' => 'required|numeric',
            'student_answer_id' => 'required|numeric|min:1|max:4',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        }





        $answer     = question_answer::find(request()->answer_id);
        if(!isset($answer->id)){
            return ['error' => 'Answer Not Fount'];
        }



        
        $question   = $answer->question;

        $quiz       = studentQuiz::where('user_id', $this->user->id)->where('group_type', $question->group_id)->where('finishing_date', null)->first();

        if (!isset($quiz ->id)) {
            return ['error' => 'Quiz Not Found Or Expired'];
        }
            


        if(isset($quiz->finishing_date) && $quiz->finishing_date != null){
            return ['error' => 'quiz was complete'];
        }



        // $answers = $quiz->answer ?? '';
        // return count($quiz->answer);


        if(isset($quiz->answer) && count($quiz->answer) < env('NUMBER_OF_QUESTIONS')){

            $answer_field = $this->get_answer_field_number(request()->student_answer_id);
            
            $correct_answer = $this->get_answer_field_number($answer->correct_answer);

            $correct = ($answer->correct_answer == request()->student_answer_id)? 1 : 0;

            $quiz_answer = quiz_answer::where('question_id', $question->id)->where('quiz_id', $quiz->id)->first();
            
            if(!isset($quiz_answer)){
                $question_answer = new quiz_answer();
                $question_answer->quiz_id           = $quiz->id;
                $question_answer->question_id       = $question->id;
                $question_answer->question          = $question->question;
                $question_answer->answer_id         = $answer->id;
                $question_answer->answer            = $answer->$answer_field;
                $question_answer->is_correct        = $correct;
                $question_answer->correct_answer    = $answer->$correct_answer;
                $question_answer->save();
            }

            if($correct == 1){
                $quiz->update(['student_score' => ++$quiz->student_score]);
            }

            
        return $this->show($quiz);
        // return $this->index();
            // return redirect("/quiz?group_type=" . request()->group_type);
            return ['message' => 'Answer Saved Successfully'];

        }



        return $this->show($quiz);


    }








    /**
     * Display the specified resource.
     *
     * @param  \App\studentQuiz  $studentQuiz
     * @return \Illuminate\Http\Response
     */
    public function show(studentQuiz $quiz)
    {
        $quiz = studentQuiz::find($quiz->id);

        if(count($quiz->answer) >= env('NUMBER_OF_QUESTIONS')){
            $quiz->update(['finishing_date' => date('Y-m-d H:i:s')]);
            return $this->quizResult($quiz);
        }



        $a = $quiz->answer;
        $aid = [];
        foreach($a as $i){array_push($aid, $i->question_id);}




        $question = question::where('questions.is_active', 1)->whereNotIn('questions.id', $aid)->where('questions.group_id', request()->group_type)->leftJoin('question_answers', 'questions.id', 'question_answers.question_id')->inRandomOrder()->take(1)->select('*', 'question_answers.id as aid', 'questions.id as id')->first();

        if(!isset($question->aid)){return ['error' => 'No More questions'];}
        $question =  new questionResource($question);


        // $question['counter']->counter = $quiz->answer;


        return $question;


    }







    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\studentQuiz  $studentQuiz
     * @return \Illuminate\Http\Response
     */
    public function quizResult(studentQuiz $studentQuiz = null)
    {



        if(!isset($studentQuiz->id)){

            $studentQuiz = studentQuiz::where('user_id', $this->user->id)->where('finishing_date', '<>', '')->get();

        }else{
        $studentQuiz =[$studentQuiz];
            
        }


        $data =[];

        foreach($studentQuiz as $quiz){

            if($quiz->finishing_date == ''){
                return ['error' => 'quiz is not complete yet'];
            }

            $result['result'] = [
                'quizId'    => $quiz->id,
                'score'     => $quiz->student_score,
                'quizDate'  => $quiz->finishing_date,
                'quizType'  => $quiz->group_type,
            ]; 


            $result['data'] = quizResultResource::collection($quiz->answer);

            array_push($data, $result);

        }



        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\studentQuiz  $studentQuiz
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, studentQuiz $studentQuiz)
    {
        //
    }

    





    public function get_answer_field_number($answer_id)
    {
        
        switch ($answer_id) {
            case 1:
                return 'first_answer';
                break;
            case 2:
                return 'second_answer';
                break;
            case 3:
                return 'third_answer';
                break;
            case 4:
                return 'fourth_answer';
                break;
        }
    }




}
