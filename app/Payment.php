<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Payment extends Model
{
    //

    use SoftDeletes;

    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at'
    ];

    public function calendar()
    {
        return $this->belongsTo('App\Calendar');
    }

    public function client()
    {
        return $this->belongsTo('App\Client');
    }

}
