<?php

namespace App\Http\Controllers;

use App\Comanda;
use App\ProduseListaCumparaturi;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function listaCumparaturi()
    {
        $utilizator = auth()->user();
        $listaCumparaturi = ProduseListaCumparaturi::where('id_user','=',$utilizator->id)->where('id_comanda','=',null)->with(['produs'])->get();
        return view('user.lista_cumparaturi') -> with([
            'utilizator' => $utilizator,
            'listaCumparaturi' => $listaCumparaturi
        ]);
    }

    public function actualizareListaCumparaturi (Request $request)
    {
        foreach ($request->all() as $idDeActualizat => $cantitate) {
            $idListaCumparaturiDeActualizat = str_replace('id-','',$idDeActualizat);
            $randListaCumparaturi = ProduseListaCumparaturi::where('id','=',$idListaCumparaturiDeActualizat) -> first();
            if($randListaCumparaturi!==null){
                $randListaCumparaturi -> cantitate = $cantitate;
                $randListaCumparaturi->update();
            }
        }

        return back()->with(['mesaj'=>'Lista cumparaturi actualizata cu succes']);
    }

    public function adaugaLaListaCumparaturi(Request $request)
    {
        $existaInCosProdusul = ProduseListaCumparaturi::where('id_user','=',auth()-> user() -> id)->where('id_produs','=',$request -> id_produs)->where('id_comanda','=',null)
            ->first();
        if($existaInCosProdusul !== null){
            $produsDeAdaugatInListaDeCumparaturi = $existaInCosProdusul;
            $produsDeAdaugatInListaDeCumparaturi -> id_user = auth()-> user() -> id;
            $produsDeAdaugatInListaDeCumparaturi -> id_produs = $request -> id_produs;
            $produsDeAdaugatInListaDeCumparaturi -> cantitate = $produsDeAdaugatInListaDeCumparaturi->cantitate + $request -> cantitate;
            $produsDeAdaugatInListaDeCumparaturi -> update();
        }
        else{
            $produsDeAdaugatInListaDeCumparaturi = new ProduseListaCumparaturi();
            $produsDeAdaugatInListaDeCumparaturi -> id_user = auth()-> user() -> id;
            $produsDeAdaugatInListaDeCumparaturi -> id_produs = $request -> id_produs;
            $produsDeAdaugatInListaDeCumparaturi -> cantitate = $request -> cantitate;
            $produsDeAdaugatInListaDeCumparaturi -> save();
        }

        return back() -> with(['mesaj' => 'Produs adaugat cu succes']);

    }

    public function stergeProdusListaCumparaturi(Request $request)
    {

        $randListaCumparaturi = ProduseListaCumparaturi::where('id','=',$request->id)->where('id_user','=',auth()->user()->id)->first();
        if($randListaCumparaturi === null){
            return back()->with(['eroare'=>'Eroare stergere produs din lista de cumparaturi']);
        }
        if($randListaCumparaturi->delete() === false){
            return back()->with(['eroare'=>'Eroare stergere produs din lista de cumparaturi']);
        }
        return back()->with(['mesaj'=>'Produsul a fost sters din lista de cumparaturi']);

    }

    public function startComanda()
    {
        $utilizator = auth()->user();
        $listaCumparaturi = ProduseListaCumparaturi::where('id_user','=',$utilizator->id)->where('id_comanda','=',null)->with(['produs'])->get();
        return view('user.start_comanda') -> with([
            'utilizator' => $utilizator,
            'listaCumparaturi' => $listaCumparaturi
        ]);
    }

    public function finalizareComanda(Request $request)
    {
        $request -> validate([
            'nume' => 'required',
            'telefon' => 'required',
            'adresa' => 'required',
            'tip_plata' => 'required',
        ]);

        $utilizator = auth()->user();

        $listaCumparaturi = ProduseListaCumparaturi::where('id_user','=',$utilizator->id)->where('id_comanda','=',null)->with(['produs'])->get();
        $comandaNoua = new Comanda();
        $comandaNoua -> id_user = $utilizator -> id;
        $comandaNoua -> comanda_numar_inregistrare = substr(md5(mt_rand()), 0, 8);
        $comandaNoua -> nume = $request -> nume;
        $comandaNoua -> telefon = $request -> telefon;
        $comandaNoua -> adresa = $request -> adresa;
        $comandaNoua -> tip_plata = $request -> tip_plata;
        $comandaNoua-> save();

        foreach ($listaCumparaturi  as $randListaCumparaturi){
            if($randListaCumparaturi->id_comanda == null){
                $randListaCumparaturi -> id_comanda = $comandaNoua -> id;
                $randListaCumparaturi->update();
            }
        }
        $htmlEmailUtilizator= '
            Multumim pentru comanda dumneavostra<br>
            Detalii comanda<br>
            Numar inregistrare: '.$comandaNoua -> comanda_numar_inregistrare.'<br>
            Nume: '.$comandaNoua -> nume.'<br>
            Telefon: '.$comandaNoua -> telefon.'<br>
            Adresa: '.$comandaNoua -> adresa.'<br>
            Tip plata: '.$comandaNoua -> tip_plata.'<br>
            Total comanda: '.(new AdminController())->valoareComanda($comandaNoua->id).' RON<br>
        ';
        $htmlEmailAdministrator= '
            Comanda noua magazin<br>
            Detalii comanda<br>
            Numar inregistrare: '.$comandaNoua -> comanda_numar_inregistrare.'<br>
            Nume: '.$comandaNoua -> nume.'<br>
            Utilizator: '.auth()->user()->email.' <br>
            Telefon: '.$comandaNoua -> telefon.'<br>
            Adresa: '.$comandaNoua -> adresa.'<br>
            Tip plata: '.$comandaNoua -> tip_plata.'<br>
            Total comanda: '.(new AdminController())->valoareComanda($comandaNoua->id).' RON<br>
        ';
        $controlerMail = (new HomeController());
        $controlerMail->trimitereEmail('Comanda noua numarul '.$comandaNoua -> comanda_numar_inregistrare,'Comanda ta','exotic.fish.magazin@gmail.com','Exotic Fish',$utilizator -> email,$htmlEmailUtilizator);
        $controlerMail->trimitereEmail('Comanda noua numarul '.$comandaNoua -> comanda_numar_inregistrare,'Comanda noua','exotic.fish.magazin@gmail.com','Exotic Fish','exotic.fish.magazin@gmail.com',$htmlEmailAdministrator);

        return view('user.comanda_finalizata')-> with([
            'mesaj' => 'Comanda dumneavostra a fost preluata cu succes',
            'comanda' => $comandaNoua
        ]);
    }

    public function comandaFinalizata ($idComanda)
    {
        $comanda = Comanda::where('id','=',$idComanda)->firstOrFail();
        return view('user.comanda_finalizata')->with([
            'comanda' => $comanda
        ]);
    }
    public function detaliiComanda($idComanda)
    {
        $comanda = Comanda::where('id','=',$idComanda)->where('id_user','=',auth()->user()->id)->firstOrFail();
        dd(__METHOD__);
    }

}
