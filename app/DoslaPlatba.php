<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoslaPlatba extends Model {

    protected $table = 'dosla_platba';

    protected $guarded  = ['id'];

    protected $dates = ['created_at', 'updated_at', 'datum_platby', 'datum_spracovania'];

    public function stav()
    {
        return $this->belongsTo('App\DoslaPlatbaStav', 'id_dosla_platba_stav');
    }
}
