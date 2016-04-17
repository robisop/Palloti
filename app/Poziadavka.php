<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poziadavka extends Model {

    protected $table = 'poziadavka';

    protected $guarded  = ['id', 'datum_odoslania', 'datum_prijatia_odpovede'];

    protected $dates = ['created_at', 'updated_at', 'datum_odoslania', 'datum_prijatia_odpovede'];

    public function stav()
    {
        return $this->belongsTo('App\PoziadavkaStav', 'id_poziadavka_stav');
    }

    public function typ()
    {
        return $this->belongsTo('App\PoziadavkaTyp', 'id_poziadavka_typ');
    }

    public function subor()
    {
        return $this->belongsToMany('App\Subor', 'poziadavka_subor', 'id_poziadavka', 'id_subor' );
    }

    public function dieta()
    {
        return $this->belongsTo('App\Dieta', 'id_dieta');
    }
}
