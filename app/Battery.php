<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Battery extends Model
{
    protected $fillable = [
        'modello',
        'descrizione',
        'capacita',
        'potenza',
        'tensione',
        'quantita',
        'scheda_tecnica'
    ];

    public function systems()
    {
        return $this->hasMany('App\System');
    }
}
