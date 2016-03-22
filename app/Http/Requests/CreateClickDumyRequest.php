<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Auth;


class CreateClickDumyRequest extends Request
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
        if(Auth::guest()) {
            return [ 'name' => 'required|unique:clickdumies', 'user_name' => 'required', 'email' => 'required|email|max:255|unique:users', 'password' => 'required|min:6' ];
        }
        else{
            return [ 'name' => 'required|unique:clickdumies'];
        }
    }
}
