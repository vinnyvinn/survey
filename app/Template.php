<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
	
    const ACTIVE = true;

    protected $fillable = ['name','description','status'];



    public function question()
    {
    	return $this->hasMany(Questionnaire::class);
    }
}
