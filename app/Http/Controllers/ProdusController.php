<?php

namespace App\Http\Controllers;

use App\CategorieProdus;
use App\Produs;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProdusController extends Controller
{

    function produseToate(){

        $produse = Produs::all();
        $categorii =CategorieProdus::all();
        $linkuriCategorii = [
            1 => route('apa-sarata'),
            2 => route('apa-dulce'),
            3 => route('hrana-pesti'),

        ];

        return view('produse.toate')->with([
            "produse" => $produse,
            "categorii" => $categorii,
            'linkuriCategorii' => $linkuriCategorii
        ]);
    }
    function produseApaDulce(){
        return view('home');
    }
    function produseHranaPesti(){
        return view('home');
    }
    function produseApaSarata(){
        return view('home');
    }
    function produsDetalii($idProdus){
        dd('detalii produs',$idProdus);
    }
}
