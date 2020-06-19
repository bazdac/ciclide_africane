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

        $produse = Produs::where('id_categorie','=',2)->get();
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
    function produseHranaPesti(){
        $produse = Produs::where('id_categorie','=',3)->get();
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
    function produseApaSarata(){
        $produse = Produs::where('id_categorie','=',1)->get();
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
    function produsDetalii($idProdus){
        $produs = Produs::where('id','=',$idProdus)->firstOrFail();

        return view('produse.detalii_produs')->with([
            'produs' => $produs
        ]);
    }
}
