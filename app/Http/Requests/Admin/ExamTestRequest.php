<?php

namespace App\Http\Requests\Admin;

use App\Traits\RequestResponseTrait;
use Illuminate\Foundation\Http\FormRequest;

class ExamTestRequest extends FormRequest
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
            'exam_pack_id' => 'nullable|exists:exam_packs,id',
            'title' => 'required|string|min:3',
            'exam_schedule' => 'required|date',
            'duration_minutes' => 'nullable|integer',
            'price' => 'required|regex:/^[0-9]+(\.[0-9][0-9]?)?$/',
            'mark_per_question' => 'required|regex:/^[0-9]+(\.[0-9][0-9]?)?$/',
            'negative_mark_per_question' => 'required|regex:/^[0-9]+(\.[0-9][0-9]?)?$/',
            'type' => 'required',
        ];
    }
}
