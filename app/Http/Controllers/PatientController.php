<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PatientController extends Controller
{
    //

    public function cita(){
        return view('theme.frontoffice.pages.user.patient.cita');
    }
}
