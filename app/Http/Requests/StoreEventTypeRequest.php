<?php

namespace Community\Http\Requests;

use Community\Http\Requests\Request;

class StoreEventTypeRequest extends Request
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
     * Get the validation rules that Communityly to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|min:1|max:255',
            'description' => 'max:255',
            'location' => 'max:30',
            'capacity' => 'integer',
        ];
    }
}