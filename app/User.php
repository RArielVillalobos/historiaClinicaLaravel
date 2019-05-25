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

    //las fechas que trabajaremos en nuestro modelo
    //updated_at y created_at no son necesarias
   protected $dates=['dob'];

    //Almacenimiento
    public function store($request){
        //asignacion masiva
        $passwordHasheado=bcrypt($request->password);
        $request->merge(['password'=>$passwordHasheado]);

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

        self::update($request->input());
        alert('Exito','Usuario actualizado','success');

    }



    //RELACIONES

    public function permissions(){
        return $this->belongsToMany(Permission::class)->withTimestamps();
    }
    public function roles(){
    return $this->belongsToMany(Role::class)->withTimestamps();
    }

    public function specialities(){
        return $this->belongsToMany(Speciality::class)->withTimestamps();

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
    public function has_any_role(array $roles){
        foreach ($roles as $role){
            if($this->has_role($role)){
                return true;
            }

        }
        return false;
    }

    //$el id es el slug del permiso
    public function has_permission($id){
        $encontrado=false;
        foreach ($this->permissions as $permission){
            if($permission->id==$id || $permission->slug==$id){
                $encontrado=true;
            }

        }
        return $encontrado;
    }
    //RECUPERACION DE INFORMACION
    public function age(){
        if($this->dob!=null){
            $age=$this->dob->age;
            $years=($age==1)?' año' : 'años';

            $msj=$age.' '.$years;

        }else{
            $msj='indefinido';
        }

        return $msj;

    }
    public function visible_users(){
        if($this->has_role(config('app.admin_role'))){
            $users= self::all();
        }

        elseif($this->has_role(config('app.secretary_role'))){
            //whereHas nos permite evaluar lo que pertenece a un usuario con relacion a su tabla pivote
            //devuelve todos los usuarios que tengan el rol paciente y rol medico
            $users=self::whereHas('roles',function ($q){
                //aca podemos acceder a las propiedades de nuestro rol
                    $q->whereIn('slug',[
                        config('app.medico_role'),
                        config('app.patient_role'),

                    ]);

            })->get();
        }
        elseif($this->has_role(config('app.medico_role'))){
            $users=self::whereHas('roles',function ($q){
                //aca podemos acceder a las propiedades de nuestro rol
                $q->whereIn('slug',[config('app.patient_role'),
                ]);

            })->get();

        }

        return $users;
    }

    public function visible_roles(){
        if($this->has_role(config('app.admin_role'))) $roles=Role::all();

        if($this->has_any_role([config('app.secretary_role'),config('app.medico_role')])){
            //solamente mostraria el rol paciente (el secretario solo puede crear este tipo de usuarios)

            //como necesitamos que lo retorne en forma de collecion usamos el metodo get y no el first
            $roles=Role::where('slug',config('app.patient_role'))->get();

        }

        return $roles;
    }

    public function list_roles(){
         //que solamente retorne el nombre y lo convierta en un array
        $roles=$this->roles->pluck('name')->toArray();
        //el primer parametro es el separador, y el segundo para es el arreglo a seprar
        // es lo opuesto al explode que retorna una arreglo
        $string=implode(', ',$roles);
        return $string;

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

    //vistas para edit
    public function edit_view($view=null){
        $auth=auth()->user();




        //si la variable view no es nula
        if(!is_null($view) && $view=='frontoffice'){

            return 'theme.frontoffice.pages.user.edit';
        //si el usuario autenticado es admin o secretario ir a la vista editar usuario del panel
        }else if($auth->has_any_role([config('app.admin_role'),config('app.secretary_role')])){

            return 'theme.backoffice.pages.user.edit';


        }else{
            return 'theme.frontoffice.pages.user.edit';
        }


    }

    public function user_show($view=null){
        $auth=auth()->user();
        //si la variable view no es nula
        if(!is_null($view) && $view=='frontoffice'){
            return 'frontoffice.user.profile';


        }else if($auth->has_any_role([config('app.admin_role'),config('app.secretary_role')])){

            //si el usuario autenticado es admin o secretario ir a la vista editar usuario del panel
            return 'backoffice.user.show';


        }else{

            return 'frontoffice.user.profile';
        }


    }



}
