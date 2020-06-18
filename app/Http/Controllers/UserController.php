<?php

namespace App\Http\Controllers;

use App\ProduseListaCumparaturi;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function listaCumparaturi()
    {
        dd('cos cumparaturi');
    }

    public function adaugaLaListaCumparaturi(Request $request)
    {
        $produsDeAdaugatInListaDeCumparaturi = new ProduseListaCumparaturi();
        $produsDeAdaugatInListaDeCumparaturi -> id_user = auth()-> user() -> id;
        $produsDeAdaugatInListaDeCumparaturi -> id_produs = $request -> id_produs;
        $produsDeAdaugatInListaDeCumparaturi -> cantitate = $request -> cantitate;
        $produsDeAdaugatInListaDeCumparaturi -> save();

        return back() -> with(['mesaj' => 'Produs adaugat cu succes']);


    }

}
