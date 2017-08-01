<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Arbeitsschein extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "arbeitsschein";

    protected $fillable = [
        'asid','kid', 'mid', 'description', 'ttid', 'tkid', 'dateFrom', 'dateTo', 'timeFrom', 'timeTo', 'billedTime', 'kulanzzeit', 'kulanzgrund'
    ];

    public $timestamps = false;

    
}
