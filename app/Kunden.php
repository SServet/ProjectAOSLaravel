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
        'KID', 'Anrede', 'Titel', 'Vorname', 'Nachname', 'Land', 'PLZ', 'Ort', 'EMail','Telefon','Mobil','Fax','Web','UIDNummer','Steuernummer'
    ];

    public $timestamps = false;
    
}
