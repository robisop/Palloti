<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jazyk extends Model {

    protected $table = 'jazyk';

    protected $guarded  = ['id'];

    public function prekladatel()
    {
        return $this->belongsToMany('App\Prekladatel', 'jazyk_prekladatel', 'id_jazyk', 'id_prekladatel' );
    }
}
