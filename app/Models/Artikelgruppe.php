<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Artikelgruppe
 */
class Artikelgruppe extends Model
{
    protected $table = 'artikelgruppe';

    protected $primaryKey = 'agid';

	public $timestamps = false;

    protected $fillable = [
        'description'
    ];

    protected $guarded = [];

        
}