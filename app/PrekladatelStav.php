<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrekladatelStav extends Model {

    protected $table = 'prekladatel_stav';

    protected $guarded  = ['id'];

    public function prekladatel()
    {
        return $this->hasMany('App\Prekladatel', 'id_prekladatel_stav');
    }
    
}
