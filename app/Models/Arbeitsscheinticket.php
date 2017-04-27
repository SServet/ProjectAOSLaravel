<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Arbeitsscheinticket
 */
class Arbeitsscheinticket extends Model
{
    protected $table = 'arbeitsscheinticket';

    protected $primaryKey = 'atID';

	public $timestamps = false;

    protected $fillable = [
        'tid',
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