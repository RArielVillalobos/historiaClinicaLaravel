<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //de la ruta extrae al modelo user

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
            'name'=>'required|max:255|string',
            'dob'=>'required',
            //omita la validacion unique si es el mismo usuario
            'email'=>'required|string|email|max:255|unique:users,email,'.$this->route('user'),


        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'El nombre es requerido',
            'name.max'=>'El numero de caracteres no puede pasar los 255',
            'name.string'=>'El nombre debe ser un texto',
            'dob.required'=>'La fecha de cumpleaños es requerida',
            'email.required'=>'El email es requerido',
            'email.string'=>'Ingrese un valor valido',
            'email.email'=>'Ingrese un valor valido',
            'email.max'=>'Maximo 255 caracteres',
            'email.unique'=>'El email ingresado ya existe',


        ];
    }
}
