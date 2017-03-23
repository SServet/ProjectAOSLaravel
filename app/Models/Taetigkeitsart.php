<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Taetigkeitsart
 */
class Taetigkeitsart extends Model
{
    protected $table = 'taetigkeitsart';

    protected $primaryKey = 'tkid';

	public $timestamps = false;

    protected $fillable = [
        'description'
    ];

    protected $guarded = [];

        
}