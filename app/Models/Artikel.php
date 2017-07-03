<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Artikel
 */
class Artikel extends Model
{
    public $table = 'artikel';

    protected $primaryKey = 'artid';

	public $timestamps = false;

    protected $fillable = [
        'artid',
        'description',
        'unit',
        'agid',
        'mwst',
        'articlename',
        'salePrice'
    ];

    protected $guarded = [];

        
}