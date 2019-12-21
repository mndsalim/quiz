<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\studentQuiz;


class quiz_answer extends Model
{
    protected $guarded = [];


    public function quiz()
    {
    	return $this->belongsTo(studentQuiz::class);
    }
}
