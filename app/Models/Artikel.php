<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Artikel
 */
class Artikel extends Model
{
    protected $table = 'artikel';

    protected $primaryKey = 'aNr';

	public $timestamps = false;

    protected $fillable = [
        'description',
        'unit',
        'agid',
        'mwst',
        'articlename',
        'salePrice'
    ];

    protected $guarded = [];

        
}