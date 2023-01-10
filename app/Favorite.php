<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $fillable = [
        'user_id',
         'property_id',
         'is_favourite',
    ];

    public function user(){

        return $this->belongsTo(User::class);

    }
    public function property(){

        return $this->belongsTo(Property::class);

    }
}
