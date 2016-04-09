<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpravaStav extends Model {

    protected $table = 'sprava_stav';

    protected $guarded  = ['id'];

    public function listok()
    {
        return $this->hasMany('App\Sprava', 'id_sprava_stav');
    }
    
}
