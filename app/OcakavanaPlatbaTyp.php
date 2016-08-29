<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OcakavanaPlatbaTyp extends Model {

    protected $table = 'ocakavana_platba_typ';

    protected $guarded  = ['id'];

    public function ocakavanaPlatba()
    {
        return $this->hasMany('App\OcakavanaPlatba', 'id_ocakavana_platba_typ');
    }
}
