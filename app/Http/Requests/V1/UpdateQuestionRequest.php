<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class UpdateQuestionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $user=$this->user();
        return $user != null && $user->tokenCan('update');  
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $method=$this->method();
        if($method=='PUT'){

            return [
                'type' => ['required'],
                'rate' => ['nullable'],
                'mytextchoices' => ['nullable'],
                'title' => ['required'],
                'status' => ['required'],
                'required' => ['required'],
                'survey_main'=>['required']
            ];
        }
       return [
        'type' => ['sometimes','required'],
        'rate' => ['sometimes','nullable'],
        'mytextchoices' => ['sometimes','nullable'],
        'title' => ['sometimes','required'],
        'status' => ['sometimes','required'],
        'required' => ['sometimes','required'],
        'survey_main'=>['sometimes','required']
       ];
    }
}
