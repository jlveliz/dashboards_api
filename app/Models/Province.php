<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{


    protected $fillable = [
        'name',
        'code'
    ];

    /**
     * Relations
     */
    public function country()
    {
        return $this->belongsTo('App\Models\Country', 'country_id');
    }
}
