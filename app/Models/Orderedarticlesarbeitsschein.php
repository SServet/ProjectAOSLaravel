<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Orderedarticlesarbeitsschein
 */
class Orderedarticlesarbeitsschein extends Model
{
    protected $table = 'orderedarticlesarbeitsschein';

	public $timestamps = false;

    protected $fillable = [
    	'asid',
        'artid',
        'count',
        'unit'
    ];

    protected $guarded = [];

        
}