<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TextePromotii extends Model
{
    //
    protected $fillable = ['id','descriere'];

    public function textPromotie()
    {
        return TextePromotii::firstOrCreate(['id' => 1])->descriere;

    }

    public function textDiscount()
    {
        return TextePromotii::firstOrCreate(['id' => 2])->descriere;
    }

    public function textLivrare()
    {
        return TextePromotii::firstOrCreate(['id' => 3])->descriere;
    }

    public function textRetur()
    {
        return TextePromotii::firstOrCreate(['id' => 4])->descriere;
    }
}
