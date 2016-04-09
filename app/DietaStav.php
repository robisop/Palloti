<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DietaStav extends Model {

    protected $table = 'dieta_stav';

    protected $guarded  = ['id'];

    public function dieta()
    {
        return $this->hasMany('App\Dieta', 'id_dieta_stav');
    }
}
