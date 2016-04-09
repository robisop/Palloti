<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Krajina extends Model {

    protected $table = 'krajina';

    protected $guarded  = ['id'];

    public function misia()
    {
        return $this->hasMany('App\Misia', 'id_krajina');
    }

    public function adresa()
    {
        return $this->hasMany('App\Adresa', 'id_krajina');
    }

    public function dieta()
    {
        return $this->hasManyThrough('App\Dieta', 'App\Misia', 'id_krajina', 'id_misia');
    }
}
