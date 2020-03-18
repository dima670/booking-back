<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Calendar extends Model
{
    //

    use SoftDeletes;

    protected $attributes = [
        'cancelled' => false,
    ];

    protected $fillable = [
        'room_id',
        'time_from',
        'time_to',
        'cancelled',
        'comment',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at'
    ];

    public function payment()
    {
        return $this->hasOne('App\Payment');
    }

    public function room()
    {
        return $this->belongsTo('App\Room');
    }

    public function client()
    {
        return $this->belongsTo('App\Client');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
