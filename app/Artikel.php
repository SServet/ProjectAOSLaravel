<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Artikel extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "Artikel";

    protected $fillable = [
        'aNr','agid','articlename','salePrice','unit','mwst','description'
    ];

    public $timestamps = false;
    
}
