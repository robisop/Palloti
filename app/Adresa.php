<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adresa extends Model {

    protected $table = 'adresa';

    protected $guarded  = ['id'];

    public function krajina()
    {
        return $this->belongsTo('App\Krajina', 'id_krajina');
    }

    public function prekladatel()
    {
        return $this->hasMany('App\Prekladatel', 'id_adresa');
    }
    
}
