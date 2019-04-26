<?php

namespace App\Http\Controllers;

use App\Http\Requests\Role\storeRequest;
use App\Http\Requests\Role\UpdateRequest;
use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //pendiente: añadir autorizacion con policy
        $roles=Role::all();
        return view('theme.backoffice.pages.role.index',['roles'=>$roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //pendiente: añadir autorizacion con policy
        return view('theme.backoffice.pages.role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeRequest $request,Role $role)
    {
        //$request->validated();
        $role=$role->store($request);
        return redirect()->route('backoffice.role.show',$role);



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
        //pendiente: añadir autorizacion con policy
        return view('theme.backoffice.pages.role.show',['role'=>$role]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
        return view('theme.backoffice.pages.role.edit',['role'=>$role]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Role $role)
    {
        //
        $role->my_update($request);
        alert('Éxito','El rol se ha actualizado','success')->showConfirmButton();
        return redirect()->route('backoffice.role.show',['role'=>$role]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //pendiente: añadir autorizacion con policy
        toast('rol eliminado!','success','top-right');
        $role->delete();
        return redirect()->route('backoffice.role.index');

    }
}
