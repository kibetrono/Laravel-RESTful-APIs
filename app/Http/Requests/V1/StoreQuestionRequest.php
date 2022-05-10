<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuestionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $user=$this->user();
        return $user != null && $user->tokenCan('create');     }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'type' => ['required'],
            'rate' => ['nullable'],
            'mytextchoices' => ['nullable'],
            'title' => ['required'],
            'description' => ['required'],
            'status' => ['required'],
            'required' => ['required'],
            'survey_main'=>['required'],
        ];
    }
}
