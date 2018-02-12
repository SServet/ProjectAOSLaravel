<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Orderedarticlesarbeitsschein
 */
class Orderedarticlesproject extends Model
{
    protected $table = 'orderedarticlesproject';

	public $timestamps = false;

    protected $fillable = [
    	'pid',
        'artid',
        'count',
        'unit'
    ];

    protected $guarded = [];

        
}