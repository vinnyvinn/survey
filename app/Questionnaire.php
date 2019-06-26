<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
        
    const ACTIVE = true;

    const USER_INPUT = 1;
    const SELECT_ONE = 2;
    const SELECT_MULTIPLE = 3;

    protected $fillable = ['template_id','question','type','status'];


    public function template()
    {
    	return $this->belongsTo(Template::class);
    }


    public function answer()
    {
    	return $this->hasMany(Answer::class);
    }

    public static function Bytemplate($id)
    {
        return self::where('template_id',$id);
    }

}
