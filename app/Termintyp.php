<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Termintyp extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "Termintyp";

    protected $fillable = [
        'TTID','Bezeichnung'
    ];

    public $timestamps = false;
    
}
