<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    //
    protected $filiable=['name','slug','description'];

    //RELACIONES
    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function users(){
        return $this->belongsToMany(User::class)->withTimestamps();
    }


    //ALMACENAMIENTO

    //VALIDACION

    //RECUPERACION DE INFORMACION

    //OTRAS OPERACIONES

}

