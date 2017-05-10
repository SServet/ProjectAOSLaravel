<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Ticket extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "ticket";

    protected $fillable = [
        'tid', 
        'kid', 
        'mid', 
        'label',
        'description',
        'creationDate',
        'finishedOn',
        'settledOn',
        'isClosed'
    ];

    public $timestamps = false;
    
}
