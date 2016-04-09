<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sprava extends Model {

    protected $table = 'sprava';

    protected $guarded  = ['id', 'datum_nastavenia_stavu', 'datum_prijatia', 'datum_odoslania_prekladatelovi'];

    protected $dates = ['created_at', 'updated_at', 'datum_nastavenia_stavu', 'datum_prijatia', 'datum_odoslania_prekladatelovi'];

    public function stav()
    {
        return $this->belongsTo('App\SpravaStav', 'id_sprava_stav');
    }

    public function typ()
    {
        return $this->belongsTo('App\SpravaTyp', 'id_sprava_typ');
    }

    public function sposobDorucenia()
    {
        return $this->belongsTo('App\SposobDorucenia', 'id_sposob_dorucenia');
    }

    public function subor()
    {
        return $this->belongsToMany('App\Subor', 'sprava_subor', 'id_sprava', 'id_subor' );
    }

    public function prelozenySubor()
    {
        return $this->belongsToMany('App\Subor', 'sprava_prelozeny_subor', 'id_sprava', 'id_subor' );
    }

    public function dieta()
    {
        return $this->belongsTo('App\Dieta', 'id_dieta');
    }

    public function rodic()
    {
        return $this->belongsTo('App\Rodic', 'id_rodic');
    }

    public function prekladatel()
    {
        return $this->belongsTo('App\Prekladatel', 'id_prekladatel');
    }

    public function jazyk()
    {
        return $this->belongsTo('App\Jazyk', 'id_jazyk');
    }
}
