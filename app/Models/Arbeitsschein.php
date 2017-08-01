<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Arbeitsschein
 */
class Arbeitsschein extends Model
{
    protected $table = 'arbeitsschein';

    protected $primaryKey = 'asid';

	public $timestamps = false;

    protected $fillable = [
        'kid',
        'mid',
        'description',
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

    public function artikel(){
        return $this->belongsToMany('App\Models\Artikel', 'arbeitsschein_artikel');
    }
        
}