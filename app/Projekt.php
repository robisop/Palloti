<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projekt extends Model {

    protected $table = 'projekt';

    protected $guarded  = ['id'];

    public function subor()
    {
        return $this->belongsToMany('App\Subor', 'projekt_subor', 'id_projekt', 'id_subor' );
    }

    public function stav()
    {
        return $this->belongsTo('App\ProjektStav', 'id_projekt_stav');
    }

    public function dieta()
    {
        return $this->belongsTo('App\Dieta', 'id_dieta');
    }
}
