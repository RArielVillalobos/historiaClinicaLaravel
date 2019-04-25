<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    protected $fillable=['name','slug','description',];

    //RELACIONES

    public function permissions(){
        return $this->hasMany(Permission::class);
    }

    public function users(){
        return $this->belongsToMany(User::class)->withTimestamps();;
    }

//ALMACENAMIENTO
    public function store($request){
        $slug=str_slug($request->name,'-');
        //agregamos el slug a la peticion
        $request->merge(['slug'=>$slug]);
      return  self::create($request->input());


    }

//VALIDACION

//RECUPERACION DE INFORMACION

//OTRAS OPERACIONES
}

