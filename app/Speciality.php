<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Speciality extends Model
{
    //
    protected $fillable=['name'];

    //RELACIONES
    public function users(){
        return $this->belongsToMany(User::class)->withTimestamps();


    }

    //ALMACENIMIENTO
    public function store($request){
        return self::create($request->input());


    }

    public function my_update($request){
        return self::update($request->input());

    }



}
