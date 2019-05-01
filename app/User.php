<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'dob', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Almacenimiento
    public function store($request){
        //asignacion masiva
        $user=self::create($request->input());
        //obtenemos los roles que nos mando el request, en este caso es uno
        $roles=[$request->role_id];
        //obtenemos los permisos de ese rol
        $permissions=Role::find($roles[0])->permissions;
        //sincronizamos los roles a usuario creado
        $user->roles()->sync($roles);
        //sincronizamos los permisos de dicho rol al usuario
        $user->permissions()->sync($permissions);

        alert('Exito','Usuario creado con exito','success');
        return $user;

    }

    public function my_update($request){
        
    }



    //RELACIONES

    public function permissions(){
        return $this->belongsToMany(Permission::class)->withTimestamps();
    }
    public function roles(){
    return $this->belongsToMany(Role::class)->withTimestamps();
    }


    //VALIDACIONES
    public function is_admin(){
        $is_admin=false;
        $admin=config('app.admin_role');
        if($this->has_role($admin)){
            $is_admin=true;
        }else{
            $is_admin=false;
        }

        return $is_admin;

    }
    //si este usuario ya tiene el rol que se envia por defecto enviamos true
    public function has_role($id){
        $encontrado=false;
        foreach ($this->roles as $role){
            if($role->id==$id || $role->slug==$id){
                $encontrado=true;
            }

        }
        return $encontrado;
    }

    public function has_permission($id){
        $encontrado=false;
        foreach ($this->permissions as $permission){
            if($permission->id==$id || $permission->slug==$id){
                $encontrado=true;
            }

        }
        return $encontrado;
    }

    //OTRAS OPERACIONES
    public function verify_permission_integrity(array $roles){
        //los permisos que tiene el usuario
        $permissions=$this->permissions;
        foreach($permissions as $permission){
            //si este usuario no tiene el rol del permiso
            //quitar dicho permiso
            //si el permiso que estamos recorriendo no se encuentra dentro de los roles que estamos sincronizando con el usuario entonces elimina el permiso

            if(!in_array($permission->role->id,$roles)){
                $this->permissions()->detach($permission->id);
            }
        }

    }

    //recibe un arreglo de roles nuevos que se le esten asignando al usuario
    public function permission_mass_assignament(array $roles){
        foreach($roles as $role){
            if(!$this->has_role($role)){
                $role_obj=Role::findOrFail($role);
                $permissions=$role_obj->permissions;
                //como queremos conservar los permisos que ya tiene el usuario NO USAMOS
                //que solamente se sincronizen los nuevos permisos
                //pasamos como parametro la coleccion de modelos
                $this->permissions()->syncWithoutDetaching($permissions);

            }
        }

    }



}
