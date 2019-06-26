<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SurveyResponse extends Model
{
    
    protected $fillable = ['user_id','survey_id','question_id','answer_type','answer'];


    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function survey()
    {
    	return $this->belongsTo(Template::class);
    }

    public function question()
    {
    	return $this->belongsTo(Questionnaire::class);
    }
}
