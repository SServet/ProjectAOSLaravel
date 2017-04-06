<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Ticket
 */
class Ticket extends Model
{
    protected $table = 'ticket';

    protected $primaryKey = 'tid';

	public $timestamps = false;

    protected $fillable = [
        'atid',
        'kid',
        'mid',
        'label',
        'description',
        'creationDate',
        'finishedOn',
        'settledOn'
    ];

    protected $guarded = [];

        
}