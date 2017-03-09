<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Taetigkeitsart extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "taetigkeitsart";

    protected $fillable = [
        'tkid','description'
    ];

    public $timestamps = false;
    
}
