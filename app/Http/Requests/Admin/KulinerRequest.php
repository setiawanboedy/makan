<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class KulinerRequest extends FormRequest
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
            'resto_id'=>'integer',
            'name'=>'required|max:255',
            'hp'=>'required|integer',
            'status'=>'max:255',
            'image'=>'required|image',
            'address'=>'required|max:255',
            'latlng'=>'required',
            'table'=>'required|integer',
            'room'=>'required|integer'
        ];
    }
}
