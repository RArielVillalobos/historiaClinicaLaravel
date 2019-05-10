<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class ChangePasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $auth=$this->user();
        return $this->user()->can('update_password',$auth);


    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    //validacion usando closures// Using Closures
    public function rules()
    {
        return [
            'old_password'=>[
                'required',
                function($attribute,$value,$fail){
                   //el valor es lo que esta introduciendo el usuario// el otro valor es la contraseña del usuario
                    //si es correcto dira que la clave es correcta
                    if(!Hash::check($value,$this->user()->password)){

                        $fail('tu contraseña no coincide');
                        //min 8:28 video 102

                    }

                }

            ],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ];
    }

    //podemos personalizar el mensaje si creamos el metodo message

}
