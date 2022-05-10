<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
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

            // select
            'select_metadata'=>$this->when($this->type == 'select',
        [
            ['options'=>
        explode(',',$this->select)

        ]

        ]),
      
            'is_ required'=>$this->required,
        ];
    }
}
