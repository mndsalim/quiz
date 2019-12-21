<?php

namespace App\Http\Resources\quiz;

use Illuminate\Http\Resources\Json\JsonResource;

class quizResultResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'question'       => $this->question,
            'answer'         => $this->answer,
            'correct_answer' => $this->correct_answer,
            'is_correct'     => $this->is_correct
        ];
    }
}
