<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rodic extends Model {

    protected $table = 'rodic';

    protected $guarded  = ['id', 'adresa_ulica', 'adresa_mesto', 'adresa_psc', 'adresa_id_krajina', 'datum_podpisu_zmluvy', 'datum_ukoncenia_zmluvy'];

    protected $dates = ['created_at', 'updated_at', 'datum_podpisu_zmluvy', 'datum_ukoncenia_zmluvy'];

    public function dieta()
    {
        return $this->belongsToMany('App\Dieta', 'dieta_rodic', 'id_rodic', 'id_dieta');
    }

    public function subor()
    {
        return $this->belongsToMany('App\Subor', 'rodic_subor', 'id_rodic', 'id_subor' );
    }

    public function stav()
    {
        return $this->belongsTo('App\RodicStav', 'id_rodic_stav');
    }

    public function sposobKomunikacie()
    {
        return $this->belongsTo('App\SposobKomunikacie', 'id_sposob_komunikacie');
    }

    public function adresa()
    {
        return $this->belongsTo('App\Adresa', 'id_adresa');
    }
}
