<?php

namespace App\Http\Controllers;

use App\CategorieProdus;
use App\Http\Controllers\Controller;
use App\Produs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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
        $categorii = CategorieProdus::all()->get();
        return view('admin.categorii')->with([
                'categorii' => $categorii
        ]
        );
    }
    function comenzi(){
        dd(__METHOD__);
    }

    function produse(){
        $categorii = CategorieProdus::all();
        $produse = Produs::all();
        return view('admin.produse')->with([
                'categorii' => $categorii,
                'produse' => $produse
            ]
        );
    }
    function utilizatori(){
        dd(__METHOD__);
    }

    function adaugaProdus(){
        $categorii = CategorieProdus::all();
        return view('admin.adauga_produs')->with([
                'categorii' => $categorii
            ]
        );;
    }
    function creareProdus(Request $request){

        $request -> validate([
            'nume' => 'required',
            'descriere' => 'required',
            'pret' => 'required|numeric',
            'cantitate' => 'required|numeric',
            'poza' => 'required',
            'categorie' => 'integer',
        ]);

        $produs = new Produs();
        $produs -> nume = $request -> nume;
        $produs -> descriere = $request -> descriere;
        $produs -> pret = (float)$request -> pret;
        $produs -> cantitate_in_stoc = $request -> cantitate;
        $produs -> link_poza = $request -> poza;
        $produs -> id_categorie = $request -> categorie;
        $produs -> save();
        return redirect()->route('editeaza-produs',$produs->id)->with([
            'mesaj' => 'Adaugare reusita'
        ]);
    }

    function editeazaProdus($idprodus){

        $produs = Produs::where('id','=',$idprodus)->firstOrFail();

        $categorii = CategorieProdus::all();

        return view('admin.editare_produs')->with([
            'categorii' => $categorii,
            'produs' => $produs,
            'mesaj' => 'Adaugare produs efectuata cu succes'
        ]);

    }
    function actualizareProdus(Request $request,$idProdus){
        $request -> validate([
            'nume' => 'required',
            'descriere' => 'required',
            'pret' => 'required|numeric',
            'cantitate' => 'required|numeric',
            'poza' => 'required',
            'categorie' => 'integer',
        ]);
        $produs = Produs::where('id','=',$idProdus)->firstOrFail();
        $produs -> nume = $request -> nume;
        $produs -> descriere = $request -> descriere;
        $produs -> pret = (float)$request -> pret;
        $produs -> cantitate_in_stoc = $request -> cantitate;
        $produs -> link_poza = $request -> poza;
        $produs -> id_categorie = $request -> categorie;
        $produs -> save();
        return redirect()->route('editeaza-produs',$produs->id)->with([
            'mesaj' => 'Actualizare efectuata cu succes'
        ]);
    }

    function stergeProdus($idProdus){

        dd($idProdus);
    }

    public function listaPoze(){

        $path = public_path('images/pesti');
        $files = File::files($path);
        foreach ($files as $file){
            $links[] = asset('images/pesti/'.pathinfo($file)['basename']);
        }
    }
}
