<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuizFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'duration' => 'required',
            'question_count' => 'required',
            'category_id' => 'required'
        ];
    }
}
