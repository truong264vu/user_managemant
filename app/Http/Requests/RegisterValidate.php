<?php

namespace App\Http\Requests;
use Illuminate\Support\Facades\DB;

use Illuminate\Foundation\Http\FormRequest;

class RegisterValidate extends FormRequest
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
            //
            'email_register' => ['required','email',          
              function ($attribute, $value, $fail) {
                $email = DB::table('users')->where('email',$value)->first();
                if(isset($email)){
                    $fail('The email has already been taken.');
                }
            }
            ],
            'name' => 'required|max:10',
            'password_register' => 'required|min:8|max:20',
            'confirm_password' => 'required|same:password_register'
        ];
    }
}
