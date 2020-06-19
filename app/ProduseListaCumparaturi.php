<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProduseListaCumparaturi extends Model
{
    //
    function produs(){
        return $this -> belongsTo('App\Produs','id_produs','id');
    }
}
