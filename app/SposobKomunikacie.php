<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SposobKomunikacie extends Model {

    protected $table = 'sposob_komunikacie';

    protected $guarded  = ['id'];

    public function rodic()
    {
        return $this->hasMany('App\Rodic', 'id_sposob_komunikacie');
    }
    
}
