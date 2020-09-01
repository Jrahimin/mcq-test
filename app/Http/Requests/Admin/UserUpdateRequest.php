<?php

namespace App\Http\Requests\Admin;

use App\Traits\RequestResponseTrait;
use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'id'        => 'required|exists:users,id',
            'name'      => 'required',
            'email'     => 'required|email|unique:users,email,'.$this->id,
            'mobile_no' => 'nullable',
            'address'   => 'nullable',
            'type'      => 'nullable|integer',
            'status'    => 'nullable|integer',
        ];
    }
}
