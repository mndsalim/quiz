<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\question;

class group_type extends Model
{
    

    public function question()
    {
    	return $this->HasMany(question::class, 'group_id');
    }

    
}
