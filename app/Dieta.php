<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dieta extends Model {

    protected $table = 'dieta';

    protected $guarded  = ['id','datum_narodenia','skola_datum_nastavenia','kod','datum_pozastavene_do', 'misia_id_krajina'];

    protected $dates = ['created_at', 'updated_at', 'datum_narodenia', 'skola_datum_nastavenia', 'datum_pozastavene_do'];

    public function misia()
    {
        return $this->belongsTo('App\Misia', 'id_misia');
    }

    public function rodinnyStav()
    {
        return $this->belongsTo('App\RodinnyStav', 'id_rodinny_stav');
    }

    public function skola()
    {
        return $this->belongsTo('App\Skola', 'id_skola');
    }

    public function stav()
    {
        return $this->belongsTo('App\DietaStav', 'id_dieta_stav');
    }

    public function rodic()
    {
        return $this->belongsToMany('App\Rodic', 'dieta_rodic', 'id_dieta', 'id_rodic');
    }

    public function subor()
    {
        return $this->belongsToMany('App\Subor', 'dieta_subor', 'id_dieta', 'id_subor' );
    }

    public function projekt()
    {
        return $this->hasMany('App\Projekt', 'id_dieta');
    }



}
