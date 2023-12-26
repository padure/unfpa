<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    /**
     * @var string[]
     */

    protected $fillable = [
        'name',
        'city',
    ];
}
