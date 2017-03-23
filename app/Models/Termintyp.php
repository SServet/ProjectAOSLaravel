<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Termintyp
 */
class Termintyp extends Model
{
    protected $table = 'termintyp';

    protected $primaryKey = 'ttid';

	public $timestamps = false;

    protected $fillable = [
        'description'
    ];

    protected $guarded = [];

        
}