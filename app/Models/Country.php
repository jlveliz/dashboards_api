<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = [
        'name',
        'code'
    ];


    public function provinces()
    {
        return $this->hasMany('App\Models\Province', 'country_id');
    }
}
