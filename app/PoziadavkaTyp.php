<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PoziadavkaTyp extends Model {

    protected $table = 'poziadavka_typ';

    protected $guarded  = ['id'];

    public function poziadavka()
    {
        return $this->hasMany('App\Poziadavka', 'id_poziadavka_typ');
    }
    
}
