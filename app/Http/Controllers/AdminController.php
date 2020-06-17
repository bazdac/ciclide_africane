<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    function panouAdministrare(){

        if(auth()->user()->rol !== 'admin'){
            dd('nu esti logat ca si administrator');
        }

        return view('admin.panou_administrare');

    }

    function categorii(){
        dd(__METHOD__);
    }
    function comenzi(){
        dd(__METHOD__);
    }
    function produse(){
        dd(__METHOD__);
    }
    function utilizatori(){
        dd(__METHOD__);
    }
}
