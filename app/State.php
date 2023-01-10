<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    protected $fillable = [
        'name', 'country_id'
    ];
}
