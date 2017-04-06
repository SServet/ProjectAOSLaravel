<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Mitarbeiter
 */
class Mitarbeiter extends Model
{
    protected $table = 'mitarbeiter';

    public $timestamps = true;

    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'password',
        'isAdmin',
        'salutation',
        'title',
        'country',
        'plz',
        'city',
        'address',
        'telphone',
        'mobilephone',
        'fax',
        'web',
        'remember_token'
    ];

    protected $guarded = [];

        
}