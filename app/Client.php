<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Client extends Model
{
    //

    use SoftDeletes;

    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at'
    ];

    protected $fillable = [
        'first_name',
        'last_name',
        'middle_name',
    ];

    public function payments()
    {
        return $this->hasMany('App\Payment');
    }

    public function calendars()
    {
        return $this->hasMany('App\Calendar');
    }

}
