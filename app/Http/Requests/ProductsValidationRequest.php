<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductsValidationRequest extends FormRequest
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
            'title'=> 'required|min:5',
            'body'=> 'required|min:10',
            'price'=> 'required',
            'file'=> 'required'
        ];
    }
    public function messages(){
        return [
            'required'=>'le champ :attribute est obligatoire',
             'title.min'=>'le champ titre doit avoir au moins 5 caractéres',
             'body.min'=>'le champ description doit avoir au moins 10 caractéres',
        ];

    }
}
