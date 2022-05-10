<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSurveyRequest extends FormRequest
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
            //
            'title' => ['required'],
            'description' => ['required'],
            'status' => ['required']
        ];
    }else{
        return [
            //
            'title' => ['sometimes','required'],
            'description' => ['sometimes','required'],
            'status' => ['sometimes','required'],
        ]; 
    }

    }

}
