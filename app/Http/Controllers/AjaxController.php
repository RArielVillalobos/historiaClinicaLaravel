<?php

namespace App\Http\Controllers;

use App\Speciality;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    //
    public function user_speciality(Request $request){
        if($request->ajax()){
            $speciality=Speciality::findOrFail($request->speciality);
            $users=$speciality->users;
            return response()->json($users);
        }



    }
}
