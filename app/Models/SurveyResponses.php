<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyResponses extends Model
{
    use HasFactory;
    public $timestamps = false;

protected $fillable=[

    'survey_id', 'question_id', 'user_id', 'metadata', 'status', 'value',

];

protected $casts=['value'=>'array'];

    public function survey(){

        return $this->belongsTo(Survey::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
