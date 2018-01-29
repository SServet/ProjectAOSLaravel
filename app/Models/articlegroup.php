<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Artikelgruppe
 */
class articlegroup extends Model
{
    protected $table = 'articlegroup';

    protected $primaryKey = 'agid';

	public $timestamps = false;

    protected $fillable = [
        'description'
    ];

    protected $guarded = [];

        
}