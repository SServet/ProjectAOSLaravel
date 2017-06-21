<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Arbeitsscheinprojekt extends Authenticatable
{
    protected $table = 'arbeitsscheinProjekt';

	public $timestamps = false;

    protected $fillable = [
        'mid',
        'description',
        'artid',
        'ttid',
        'tkid',
        'dateFrom',
        'dateTo',
        'timeFrom',
        'timeTo',
        'billedTime',
        'kulanzzeit',
        'kulanzgrund'
    ];       
}