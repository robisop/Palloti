<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subor extends Model {

    protected $table = 'subor';

    protected $guarded  = ['id'];

    public function dieta()
    {
        return $this->belongsToMany('App\Dieta', 'dieta_subor', 'id_subor', 'id_dieta' );
    }

    public function rodic()
    {
        return $this->belongsToMany('App\Rodic', 'rodic_subor', 'id_subor', 'id_rodic' );
    }

    public function prekladatel()
    {
        return $this->belongsToMany('App\Prekladatel', 'prekladatel_subor', 'id_subor', 'id_prekladatel' );
    }

    public function poziadavka()
    {
        return $this->belongsToMany('App\Poziadavka', 'poziadavka_subor', 'id_subor', 'id_poziadavka' );
    }

}
