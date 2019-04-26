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
        toast('rol guardado!','success','top-right');
        //agregamos el slug a la peticion
        $request->merge(['slug'=>$slug]);
        return  self::create($request->input());

    }
    //como laravel ya tiene una funcion update, empleo la mia, anteoponiendo el my
    public function my_update($request){
        $slug=str_slug($request->name,'-');
        $request->merge(['slug'=>$slug]);
         self::update($request->input());


    }

//VALIDACION

//RECUPERACION DE INFORMACION

//OTRAS OPERACIONES
}

