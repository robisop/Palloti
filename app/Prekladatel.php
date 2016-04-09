<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prekladatel extends Model {

    protected $table = 'prekladatel';

    protected $guarded  = ['id', 'id_jazyk', 'adresa_ulica', 'adresa_mesto', 'adresa_psc', 'adresa_id_krajina'];

    public function stav()
    {
        return $this->belongsTo('App\PrekladatelStav', 'id_prekladatel_stav');
    }

    public function adresa()
    {
        return $this->belongsTo('App\Adresa', 'id_adresa');
    }

    public function sposobDorucenia()
    {
        return $this->belongsTo('App\SposobDorucenia', 'id_sposob_dorucenia');
    }

    public function jazyk()
    {
        return $this->belongsToMany('App\Jazyk', 'jazyk_prekladatel', 'id_prekladatel', 'id_jazyk');
    }

    public function subor()
    {
        return $this->belongsToMany('App\Subor', 'prekladatel_subor', 'id_prekladatel', 'id_subor' );
    }


}
