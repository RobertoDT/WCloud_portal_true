<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lamp extends Model
{
    protected $fillable = [
        'modello',
        'descrizione',
        'potenza',
        'quantita',
        'scheda_tecnica'
    ];

    public function systems()
    {
        return $this->hasMany('App\System');
    }
}
