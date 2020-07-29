<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
        'province_id',
        'name',
        'code'
    ];

    public function province()
    {
        return $this->belongsTo('App\Models\User', 'province_id');
    }
}
