<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PoziadavkaStav extends Model {

    protected $table = 'poziadavka_stav';

    protected $guarded  = ['id'];

    public function poziadavka()
    {
        return $this->hasMany('App\Poziadavka', 'id_poziadavka_stav');
    }
    
}
