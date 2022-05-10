<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class SurveyResponseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [

            'survey_id'=>$this->survey_id,
            'user_id'=>$this->user_id,
            'VALUE'=>$this->value,
            'Question_id'=>$this->id,
            'type'=>$this->type,
            'created_at'=>$this->created_at,
            'status'=>$this->status,
            'title'=>$this->title,
            'description'=>$this->description,

            // Rating
            'rate_metadata'=>$this->when($this->type == 'rating',
            [
             'style'=> explode(',', $this->rate),
                // 'maximum'=> explode(',', $this->rate)[1]
             ],

            ),

                //Choice
            'choice_metadata'=>$this->when($this->type == 'choice',
            [
            [ 'options'=>
                
                explode(',', $this->mytextchoices)
                
                ]
            
            ]),

            // Text
            'text_metadata'=>$this->when($this->type == 'text',
            '{}',),

            // Dropdown
            'drop_metadata'=>$this->when($this->type == 'dropdown',
            '',),
      
            'required'=>$this->required,
            'survey_id'=>$this->survey_id,
        ];    }
}
