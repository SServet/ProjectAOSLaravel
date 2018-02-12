<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Orderedarticlesarbeitsschein
 */
class Orderedarticlesticket extends Model
{
    protected $table = 'orderedarticlesticket';

	public $timestamps = false;

    protected $fillable = [
    	'tid',
        'artid',
        'count',
        'unit'
    ];

    protected $guarded = [];

        
}