<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    protected $filiable=['name','slug','description'];

    //RELACIONES

    public function permissions(){
        return $this->hasMany(Permission::class);
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }

//ALMACENAMIENTO

//VALIDACION

//RECUPERACION DE INFORMACION

//OTRAS OPERACIONES
}

