<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Article
 */
class Article extends Model
{
    public $table = 'article';

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