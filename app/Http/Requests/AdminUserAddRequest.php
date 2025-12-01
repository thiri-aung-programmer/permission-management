<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminUserAddRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name"=> "required|string|max:255",
            "username"=>"required|string|max:255",
            'role_id' => 'required|exists:roles,id',
             "phone"=>"required",
             'email' => 'required|email|unique:admin_users',
             'address'=>'required|string',
              'pswd' => 'required|string|min:5|confirmed', 
               "gender"=>"required|in:0,1",
                'is_active'=>"required|in:0,1"
               
        ];
    }
    public function messages(): array{
        return [ 
                "name.required"=>"Please Fill name",
                "username.required"=>"Please Fill username",
                "phone.required"=>"Please Fill phone number",
                "email.unique"=>"This email  have been used",
                "email.required"=>"Please Fill email",
                "pswd.confirm"=>"Please Retype the pasword"
        ];
    }
}
