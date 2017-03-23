<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Kunden
 */
class Kunden extends Model
{
    protected $table = 'kunden';

    protected $primaryKey = 'kid';

	public $timestamps = false;

    protected $fillable = [
        'salutation',
        'title',
        'firstname',
        'lastname',
        'companyname',
        'email',
        'country',
        'plz',
        'city',
        'street',
        'telephone',
        'mobilphone',
        'fax',
        'web',
        'UIDNumber',
        'taxID'
    ];

    protected $guarded = [];

        
}