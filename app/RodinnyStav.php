<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RodinnyStav extends Model {

    protected $table = 'rodinny_stav';

    protected $guarded  = ['id'];

    public function dieta()
    {
        return $this->hasMany('App\Dieta', 'id_rodinny_stav');
    }
    
}
