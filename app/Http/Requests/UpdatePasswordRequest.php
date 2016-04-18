<?php

namespace Community\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Community\Http\Requests\Request;

class UpdatePasswordRequest extends Request
{

    public function authorize()
    {
        return Auth::check();
    }

    public function rules()
    {
        return [
            'current_password' => 'required|min:6',
            'password' => 'required|min:6|confirmed'
        ];
    }
}
