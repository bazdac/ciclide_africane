<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produs extends Model
{
    //
    public function produseListaCumparaturi(){
        return $this-> hasMany('App\ProduseListaCumparaturi');
    }
}
