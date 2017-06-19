<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Projekt extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "projekte";

    protected $fillable = [
        'pid', 
        'apid',
        'kid', 
        'mid', 
        'label',
        'description',
        'projectVolume',
        'dateOfOrder',
        'finishedOn',
        'settledOn',
        'projectType'
    ];

    public $timestamps = false;
    
}
