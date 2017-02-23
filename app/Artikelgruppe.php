<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Artikelgruppe extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "Artikelgruppe";

    protected $fillable = [
        'AgID','Bezeichnung'
    ];

    public $timestamps = false;
    
}
