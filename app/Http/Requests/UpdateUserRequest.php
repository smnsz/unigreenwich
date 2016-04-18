<?php

namespace Community\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Community\Http\Requests\Request;

class UpdateUserRequest extends Request
{

    public function authorize()
    {
        return Auth::check();
    }


    public function rules()
    {
        return [
            'first_name'         => 'required|max:255',
            'last_name'			 => 'required|max:255',
            'address'            => 'required|min:8',
            'email'              => 'required|email|max:255|unique:users,email,'.$this->user()->id,
            'username'           => 'required|max:30|unique:users,username,'.$this->user()->id,
            'year_of'			 => 'required|max:1',
            'avatar'             => 'image|max:4000',
            'bio'                => 'min:10',
            'programming'        => 'integer|min:1|max:100',
            'database'           => 'integer|min:1|max:100',
            'frontend'           => 'integer|min:1|max:100',
            'something'          => 'integer|min:1|max:100'
        ];
    }
}
