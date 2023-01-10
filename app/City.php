<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    protected $fillable = [
        'name', 'state_id'
    ];
}
