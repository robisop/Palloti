<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skola extends Model {

    protected $table = 'skola';

    protected $guarded  = ['id'];

    public function dieta()
    {
        return $this->hasMany('App\Dieta', 'id_skola');
    }
}
