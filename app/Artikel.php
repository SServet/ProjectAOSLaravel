<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Artikel extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "Artikel";

    protected $fillable = [
        'ANr','AgID','Artikelname','Verkaufspreis','Einheit','Mwst','Bezeichnung'
    ];

    public $timestamps = false;
    
}
