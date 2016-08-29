<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OcakavanaPlatba extends Model {

    protected $table = 'ocakavana_platba';

    protected $guarded  = ['id'];

    protected $dates = ['created_at', 'updated_at', 'datum_ocakavanej_platby'];

    public function typ()
    {
        return $this->belongsTo('App\OcakavanaPlatbaTyp', 'id_ocakavana_platba_typ');
    }

    public function rodic()
    {
        return $this->belongsTo('App\Rodic', 'id_rodic');
    }

    public function dieta()
    {
        return $this->belongsTo('App\Dieta', 'id_dieta');
    }

    public function projekt()
    {
        return $this->belongsTo('App\Projekt', 'id_projekt');
    }

    public function priradenaPlatba()
    {
        return $this->belongsTo('App\PriradenaPlatba', 'id_priradena_platba');
    }

}
