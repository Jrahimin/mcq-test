<?php

namespace App\Http\Requests\Admin;

use App\Traits\RequestResponseTrait;
use Illuminate\Foundation\Http\FormRequest;

class ExamPackStoreRequest extends FormRequest
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
            'title' => 'required',
            'price' => 'required|numeric',
            'mini_test_count'  => 'nullable|integer',
            'mock_test_count'  => 'nullable|integer',
            'model_test_count' => 'nullable|integer',
        ];
    }
}
