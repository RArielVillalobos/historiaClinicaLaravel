<?php

namespace App\Http\Controllers;

use App\Http\Requests\Permission\StoreRequest;
use App\Http\Requests\Permission\UpdateRequest;
use App\Permission;
use App\Role;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function __construct(){
        $this->middleware('role:'.config('app.admin_role'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $this->authorize('index',Permission::class);
        $permissions=Permission::all();
        return view('theme.backoffice.pages.permission.index',['permissions'=>$permissions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $this->authorize('create',Permission::class);
        $roles=Role::all();
        return view('theme.backoffice.pages.permission.create',['roles'=>$roles]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request,Permission $permission)
    {
        $permission=$permission->store($request);

        return redirect()->route('backoffice.permission.show',['permission'=>$permission]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        //
        $this->authorize('view',$permission);
        return view('theme.backoffice.pages.permission.show',['permission'=>$permission]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        //
        $this->authorize('update',$permission);
        $roles=Role::all();

        return view('theme.backoffice.pages.permission.edit',['permission'=>$permission,'roles'=>$roles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Permission $permission)
    {
        //
        $permission->my_update($request);
        return redirect()->route('backoffice.permission.show',$permission);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        //
        $this->authorize('delete',$permission);
        $role=$permission->role;
        $permission->delete();
        alert('Exito','Permiso eliminado','success');

        return redirect()->route('backoffice.role.show',['role'=>$role]);
    }
}
