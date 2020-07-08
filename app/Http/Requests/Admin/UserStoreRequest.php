<?php

namespace App\Http\Requests\Admin;

use App\Traits\RequestResponseTrait;
use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $this->id,
            'mobile_no' => 'nullable|string',
            'address' => 'nullable|string',
            'type' => 'nullable|in:1,2,3,4',
            'status' => 'nullable|boolean',
            'password' => 'nullable|string',
        ];
    }
}
