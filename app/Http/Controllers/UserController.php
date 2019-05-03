<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Session\Store;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users=User::all();
        return view('theme.backoffice.pages.user.index',['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles=Role::all();
        return view('theme.backoffice.pages.user.create',['roles'=>$roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request,User $user)
    {
        //
        $user=$user->store($request);

        return redirect()->route('backoffice.user.show',$user);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //

        return view('theme.backoffice.pages.user.show',['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        return view('theme.backoffice.pages.user.edit',['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, User $user)
    {
        //
        $user->my_update($request);

        return redirect()->route('backoffice.user.show',$user);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        alert('Exito','Usuario Eliminado','success');
        return redirect()->route('backoffice.user.index');

    }

    //formulario para asignar role
    public function assign_role(User $user){
        $roles=Role::all();

        return view('theme.backoffice.pages.user.assign_role',['user'=>$user,'roles'=>$roles]);
    }

    //asignar rol en la base de datos
    public function role_assignament(Request $request,User $user){
        //asignando permisos de los roles(del formulario)
        $user->permission_mass_assignament($request->roles);
        //asignacion de roles que vienen desde el formulario
        $user->roles()->sync($request->roles);
        //verifica la integridad de los permisos
        //si el usuario tiene un permiso asignado, pero le quitamos el rol al cual pertenece el permiso, debemos quitar el permiso
        $user->verify_permission_integrity($request->roles);


        alert('Exito','roles asignados','success');
        return redirect()->route('backoffice.user.show',$user);
        //dd($request->roles);

    }

    public function assign_permission(User $user){
        $roles=$user->roles;

        return view('theme.backoffice.pages.user.assign_permission',['user'=>$user,'roles'=>$roles]);

    }

    public function permission_assignament(Request $request,User $user){

        $user->permissions()->sync($request->permissions);
        alert('Exito','Permisos asignados','success');

        return redirect()->route('backoffice.user.show',$user);


    }

    public function import(){
        return view('theme.backoffice.pages.user.imports');
    }



    //Importar usuarios desde una hoja de excel
    public function make_import(Request $request){
        Excel::import(new UsersImport,$request->file('excel'));
        alert('Exito','Usuarios importados','success');
        return redirect()->route('backoffice.user.index');



    }
}
