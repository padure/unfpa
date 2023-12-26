<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'name_ro',
        'name_ru',
        'step',
        'tab'
    ];

    /**
     * @return mixed
     */
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
