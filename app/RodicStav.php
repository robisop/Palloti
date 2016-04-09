<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RodicStav extends Model {

    protected $table = 'rodic_stav';

    protected $guarded  = ['id'];

    public function rodic()
    {
        return $this->hasMany('App\Rodic', 'id_rodic_stav');
    }
}
