<?php

namespace App\Http\Requests\Project;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInfoRequest extends FormRequest
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
            'logo' => 'required',
            'thumbnail' => 'required|unique:info_project',
            'address' =>'required',
            'phone' => 'required|max:10',
            'link_register' => 'required|max:255',
            'link_film' =>'required|max:255'    
        ];
    }
}
