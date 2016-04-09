<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Misia extends Model {

    protected $table = 'misia';

    protected $guarded  = ['id'];

    public function dieta()
    {
        return $this->hasMany('App\Dieta', 'id_misia');
    }

    public function krajina()
    {
        return $this->belongsTo('App\Krajina', 'id_krajina');
    }

}
