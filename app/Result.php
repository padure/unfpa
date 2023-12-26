<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{

    /**
     * @var string[]
     */

    protected $fillable = [
        'school_id',
        'last_name',
        'first_name',
        'email',
        'phone',
        'class',
        'success_sum',
        'email_teachers',
        'pdf_url'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function school()
    {
        return $this->belongsTo(School::class);
    }
}
