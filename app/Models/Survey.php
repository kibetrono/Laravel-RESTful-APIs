<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;
    protected $fillable=[
        'title','description','status'
    ];
    
    protected $with = ['questions']; // helps to display questions on Survey Resource

    public function questions(){

        return $this->hasMany(Question::class);

    }

    public function rates(){

        return $this->hasMany(Question::class)->select(['survey_id', 'rate']);

    }

    public function responses(){
        
        return $this->hasMany(SurveyResponses::class);
    }
    
}
