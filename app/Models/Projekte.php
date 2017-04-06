<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Projekte
 */
class Projekte extends Model
{
    protected $table = 'projekte';

    protected $primaryKey = 'pid';

	public $timestamps = false;

    protected $fillable = [
        'apid',
        'kid',
        'mid',
        'label',
        'description',
        'projectVolume',
        'dateOfOrder',
        'finishedOn',
        'settledOn',
        'projectType'
    ];

    protected $guarded = [];

        
}