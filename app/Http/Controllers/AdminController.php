<?php

namespace App\Http\Controllers;

use App\CategorieProdus;
use App\Comanda;
use App\Http\Controllers\Controller;
use App\Produs;
use App\ProduseListaCumparaturi;
use App\TextePromotii;
use App\User;
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
        if(auth()->user()->rol !== 'admin'){
            return back()->with(['eroare'=>'Nu aveti access la aceste informatii']);
        }

        $comenziUtilizator = Comanda::all()->sortByDesc('created_at');
        return view('admin.lista_comenzi')->with([
            'comenziUtilizator' => $comenziUtilizator
        ]);
    }

    function produse(){
        $categorii = CategorieProdus::all();
        $produse = Produs::all();
        $linkuriPoze = $this -> listaNumePozeIncarcateSiLinkuri();
        return view('admin.produse')->with([
                'categorii' => $categorii,
                'produse' => $produse,
                'linkuriPoze' => $linkuriPoze
            ]
        );
    }

    function utilizatori(){
        $utilizatori = User::where('rol','=',null)->get();
        return view('admin.utilizatori')->with([
                'utilizatori' => $utilizatori,

            ]
        );
    }

    function adaugaProdus(){
        $categorii = CategorieProdus::all();
        $linkuriPoze = $this -> listaNumePozeIncarcateSiLinkuri();
        return view('admin.adauga_produs')->with([
                'categorii' => $categorii,
                'linkuriPoze' => $linkuriPoze,

            ]
        );
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

        $linkuriPoze = $this -> listaNumePozeIncarcateSiLinkuri();

        return view('admin.editare_produs')->with([
            'categorii' => $categorii,
            'produs' => $produs,
            'linkuriPoze' => $linkuriPoze,
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
        $produs = Produs::findOrFail($idProdus);

        $produs ->delete();

        return back()->with(['mesaj' => 'Stergere reusita']);
    }

    public function listaPoze(){

        $path = public_path('images/pesti');
        $files = File::files($path);
        foreach ($files as $file){
            $links[pathinfo($file)['filename']] = asset('images/pesti/'.pathinfo($file)['basename']);
        }
        return view('admin.lista_poze')->with([
            'linkuriPoze' => $links
        ]);

    }

    public function listaNumePozeIncarcateSiLinkuri()
    {
        $path = public_path('images/pesti');
        $files = File::files($path);
        foreach ($files as $file){
            $links[pathinfo($file)['filename']] = asset('images/pesti/'.pathinfo($file)['basename']);
        }

        return$links;
    }

    public function comenziUtilizator($idUtilizator)
    {
        if(auth()->user()->rol !== 'admin'){
            return back()->with(['eroare'=>'Nu aveti access la aceste informatii']);
        }

        $comenziUtilizator = Comanda::where('id_user','=',$idUtilizator)->get();
        $utilizator = User::where('id','=',$idUtilizator)->firstOrFail();
        return view('admin.lista_comenzi_utilizator')->with([
            'utilizator' => $utilizator,
            'comenziUtilizator' => $comenziUtilizator
        ]);
    }

    public function detaliiComanda($idComanda)
    {
        if(auth()->user()->rol !== 'admin'){
            return back()->with(['eroare'=>'Nu aveti access la aceste informatii']);
        }
        $comanda = Comanda::where('id','=',$idComanda)->firstOrFail();
        $utilizator = User::where('id','=',$comanda->id_user)->firstOrFail();
        $produseComanda = ProduseListaCumparaturi::where('id_comanda','=',$comanda-> id)->get();
        return view('admin.detalii_comanda_utilizator')->with([
            'comanda' => $comanda,
            'produseComanda' => $produseComanda,
            'utilizator' => $utilizator
        ]);
    }

    public function valoareComanda($idComanda)
    {
        $produseComanda = ProduseListaCumparaturi::where('id_comanda','=',$idComanda)->get();
        $totalComanda = 0;
        foreach ($produseComanda as $item) {
            $produs = Produs::where('id','=',$item -> id_produs)->firstOrFail();
            $totalComanda = $totalComanda + $produs->pret * $item->cantitate;
        }
        return$totalComanda;
    }

    public function salveazaCampRetur(Request $request)
    {
        $retur = TextePromotii::firstOrCreate(['id' => 4]);
        $retur -> descriere = $request -> retur;
        $retur-> update();

        return back() -> with(['mesaj'=> 'Campul retur a fost modificat cu succes']);

    }
    public function salveazaCampLivrare(Request $request)
    {
        $livrare = TextePromotii::firstOrCreate(['id' => 3]);
        $livrare -> descriere = $request -> livrare;
        $livrare -> update();

        return back() -> with(['mesaj'=> 'Campul livrare a fost modificat cu succes']);

    }
    public function salveazaCampDiscount(Request $request)
    {
        $discount = TextePromotii::firstOrCreate(['id' => 2]);
        $discount -> descriere = $request -> discount;
        $discount -> update();

        return back() -> with(['mesaj'=> 'Campul discount a fost modificat cu succes']);

    }
    public function salveazaCampPromotie(Request $request)
    {
        $promotie = TextePromotii::firstOrCreate(['id' => 1]);
        $promotie -> descriere = $request -> promotie;
        $promotie -> update();

        return back() -> with(['mesaj'=> 'Campul promotie a fost modificat cu succes']);

    }
}
