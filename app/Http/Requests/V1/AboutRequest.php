<?php

namespace App\Http\Requests;

use App\Traits\RequestResponseTrait;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\File;
use Illuminate\Validation\Rule;

class AboutRequest extends FormRequest
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
            'description_en' => 'required',
            'description_bn' => 'required',
            'menu_id' => ['required', 'integer',
                Rule::exists('menus', 'id')->where(function ($query) {
                    $query->where('status', 1);
                })
            ]
        ];
    }
}
