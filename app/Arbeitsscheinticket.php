<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Arbeitsscheinticket extends Authenticatable
{
    protected $table = 'arbeitsscheinTicket';

	public $timestamps = false;

    protected $fillable = [
        'tid',
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