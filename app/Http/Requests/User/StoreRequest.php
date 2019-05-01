<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //dd($this,1);
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
            'role_id'=>'required|numeric',
            'dob'=>'required',
            'email'=>'required|string|email|max:255|unique:users',
            //el requerido va a buscar en el formulario otro campo que sea de nombre password_confirmed
            'password'=>'required|string|min:6|confirmed',

        ];
    }

    public function messages()
    {
        return [
            'role_id.required'=>'Seleccione un rol',
            'role_id.numeric'=>'El valor no es válido',
            'name.required'=>'El nombre es requerido',
            'name.max'=>'El numero de caracteres no puede pasar los 255',
            'name.string'=>'El nombre debe ser un texto',
            'dob.required'=>'La fecha de cumpleaños es requerida',
            'email.required'=>'El email es requerido',
            'email.string'=>'Ingrese un valor valido',
            'email.email'=>'Ingrese un valor valido',
            'email.max'=>'Maximo 255 caracteres',
            'email.unique'=>'El email ingresado ya existe',
            'password.required'=>'El password es requerido',
            'password.string'=>'Ingrese un valor valido',
            'password.min'=>'Minimo 6 caracteres',
            'password.confirmed'=>'Las contraseñas coinciden'

        ];
    }
}
