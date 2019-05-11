<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //todos los metodos van a estar protegidos por este middleware(administrador)
    public function __construct()
    {
        $this->middleware('role:'.config('app.admin_role').'-'.config('app.secretary_role'));
    }

    public function show(){
        return view('theme.backoffice.pages.admin.show');
    }
}
