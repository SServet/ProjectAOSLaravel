<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Arbeitsscheinprojekt
 */
class Arbeitsscheinprojekt extends Model
{
    protected $table = 'arbeitsscheinProjekt';

    protected $primaryKey = 'apid';

	public $timestamps = false;

    protected $fillable = [
        'mid',
        'description',
        'aNr',
        'ttid',
        'tkid',
        'dateFrom',
        'dateTo',
        'timeFrom',
        'timeTo',
        'billedTime',
        'kulanzzeit',
        'kulanzgrund'
    ];

    protected $guarded = [];

        
}