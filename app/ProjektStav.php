<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjektStav extends Model {

    protected $table = 'projekt_stav';

    protected $guarded  = ['id'];

    public function projekt()
    {
        return $this->hasMany('App\Projekt', 'id_projekt_stav');
    }
    
}
