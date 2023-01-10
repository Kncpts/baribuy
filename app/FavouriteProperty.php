<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FavouriteProperty extends Model
{
    protected $fillable = [
        'user_id',
         'property_id',
    ];
}
