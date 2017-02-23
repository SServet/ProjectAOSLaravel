<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Mitarbeiter extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "Mitarbeiter";

    protected $fillable = [
        'MID', 'Benutzername', 'Passwort', 'Rolle', 'Anrede', 'Vorname', 'Nachname', 'Land', 'PLZ', 'Ort', 'EMail'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
