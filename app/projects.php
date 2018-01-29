<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class projects extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "projects";

    protected $fillable = [
        'pid', 
        'apid',
        'kid', 
        'mid', 
        'label',
        'description',
        'projectVolume',
        'creationDate',
        'finishedOn',
        'settledOn',
        'projectType'
    ];

    public $timestamps = false;
    
}
