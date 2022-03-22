<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class System extends Model
{
    protected $fillable = [
        'seriale',
        'n_telefono',
        'citta_installazione',
        'via',
        'module_id',
        'lamp_id',
        'battery_id',
        'data_installazione',
        'hardware_regolatore',
        'utc',
        'note',
    ];

    public function battery()
    {
        return $this->belongsTo('App\Battery');
    }

    public function datas()
    {
        return $this->hasMany('App\SystemData');
    }

    public function lamp()
    {
        return $this->belongsTo('App\Lamp');
    }

    public function module()
    {
        return $this->belongsTo('App\Module');
    }

    public function users()
    {
        return $this->belongsToMany('App\User', 'user_system');
    }
}
