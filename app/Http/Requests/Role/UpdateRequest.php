<?php

namespace App\Http\Requests\Role;

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
        $role = $this->route('role');
        //accedemos al usuario

        return $this->user()->can('update', $role);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    public function rules()
    {
        return [
            //aca si debemos admitir que sea unico el role,porque lo estamos actualizando
            //con $this accedemos al request y con route role al modelo y al id
            //asi salteamos el unique en el id del role
            'name'=>'required|unique:roles,name,'.$this->route('role')->id.'|max:255',
            'description'=>'required',

        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'El campo de nombre es requerido',
            'name.unique'=>'El nombre ya esta ocupado',
            'description.required'=>'la descripcion es requerida'
        ];
    }
}
