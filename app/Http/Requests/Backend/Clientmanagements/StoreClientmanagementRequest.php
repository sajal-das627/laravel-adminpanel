<?php

namespace App\Http\Requests\Backend\Clientmanagements;

use Illuminate\Foundation\Http\FormRequest;

class StoreClientmanagementRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->allow('create-clientmanagement');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name'=> 'required|max:50|alpha_dash',
            'last_name'=> 'required|max:50|alpha_dash',
            'email'=> 'required|email|max:50|unique:clientmanagements',
            'password'=> 'required|min:6|max:20|confirmed',
            'password_confirmation'=> 'required|same:password',
            'role' => 'required',
            'company_logo'=>'required',
            'company_licenseno'=>'required',
            'about_us' => ['required', 'string'],
            'status' => ['boolean'],
        
        ];
    }
}
