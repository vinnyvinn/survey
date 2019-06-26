<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    
    protected $fillable =['questionnaire_id','choice'];


    public function questionnaire()
    {

    	return $this->belongsTo(Questionnaire::class);
    }
}
