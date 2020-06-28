<?php

namespace App\Http\Requests\Admin;

use App\Traits\RequestResponseTrait;
use Illuminate\Foundation\Http\FormRequest;

class TestQuestionRequest extends FormRequest
{
    use RequestResponseTrait;

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
            'exam_test_id' => 'required|exists:exam_tests,id',
            'title' => 'required',
            'mark' => 'required',
            'answers'=>'required|array|min:4',
            'answers.*.answer'=>'required|string',
            'answers.*.is_correct'=>'required|bool',
        ];
    }
}
