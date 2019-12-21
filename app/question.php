<?php

namespace App;

use App\group_type;
use App\question_answer;
use Illuminate\Database\Eloquent\Model;


class question extends Model
{

	
    public function group_type()
    {
    	return $this->belongsTo(group_type::class);
    }



    public function answers()
    {
    	return $this->HasMany(question_answer::class);
    }


    
}
