<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Arbeitsscheinprojekt extends Authenticatable
{
    protected $table = 'arbeitsscheinticket';

	public $timestamps = false;

    protected $fillable = [
        'mid',
        'description',
        'aNr',
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