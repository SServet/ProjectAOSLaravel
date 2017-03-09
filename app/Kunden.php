<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Kunden extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "Kunden";

    protected $fillable = [
        'kid', 'salutation', 'title', 'firstname', 'lastname', 'country', 'plz', 'city', 'email','telephone','mobilephone','fax','web','UIDNumber','taxID'
    ];

    public $timestamps = false;
    
}
