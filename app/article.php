<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{


    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public $table = 'article';
    protected $fillable = [
        'artid','agid','articlename','salePrice','unit','mwst','description'
    ];


}

