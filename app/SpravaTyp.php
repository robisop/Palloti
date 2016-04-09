<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpravaTyp extends Model {

    protected $table = 'sprava_typ';

    protected $guarded  = ['id'];

    public function listok()
    {
        return $this->hasMany('App\Sprava', 'id_sprava_typ');
    }
}
