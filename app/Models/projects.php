<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Projekte
 */
class projects extends Model
{
    protected $table = 'projects';

    protected $primaryKey = 'pid';

	public $timestamps = false;

    protected $fillable = [
        'apid',
        'kid',
        'mid',
        'label',
        'description',
        'projectVolume',
        'creationDate',
        'finishedOn',
        'settledOn',
        'projectType'
    ];

    protected $guarded = [];

        
}