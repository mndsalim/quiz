<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\question;

class question_answer extends Model
{
	protected $guarded = [];

	
    public function question()
    {
    	return $this->belongsTo(question::class);
    }

    
}
