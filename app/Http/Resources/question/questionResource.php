<?php

namespace App\Http\Resources\question;

use Illuminate\Http\Resources\Json\JsonResource;
use App\studentQuiz;
use App\user;



class questionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        $user = user::find(request()->header('user_id'));

        $counter = $user->quiz()->where('group_type', request()->group_type)->where('finishing_date', null)->get()?? [];


        return [
            'id'                => $this->aid,
            'question'          => $this->question,
            'correct_answer'    => $this->correct_answer,
            'counter'           => count($counter) > 0? $counter->first()->answer->count() +1: '',
            'answers'           => [
                $this->first_answer, $this->second_answer, $this->third_answer, $this->fourth_answer 
            ],
        ];
    }
}
