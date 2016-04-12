<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PollRequest extends Request
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
            'title' => 'required',
            'answer_one' => 'required',
            'answer_two' => 'required',
            'answer_three' => 'required',
            'answer_four' => 'required'
        ];
    }
}
