<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable=[
        'type','rate','mytextchoices','title','status','required'
    ];

    public function survey(){

        return $this->belongsTo(Survey::class);

    }
    public function responses(){
        
        return $this->hasMany(SurveyResponses::class);
    }
}
