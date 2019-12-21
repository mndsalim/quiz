<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\quiz_answer;
use App\user;

class studentQuiz extends Model
{
	protected $guarded = [];
    
    public function user()
    {
    	return $this->belongsTo(user::class);
    }


    public function answer()
    {
    	return $this->HasMany(quiz_answer::class, 'quiz_id');
    }
}
