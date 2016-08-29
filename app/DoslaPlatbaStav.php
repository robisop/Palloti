<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoslaPlatbaStav extends Model {

    protected $table = 'dosla_platba_stav';

    protected $guarded  = ['id'];

    public function doslaPlatba()
    {
        return $this->hasMany('App\DoslaPlatba', 'id_dosla_platba_stav');
    }
}
