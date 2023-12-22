<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class earnings extends Model
{
    protected $guarded = [];

    public function subscribedby()
    {
        return $this->belongsTo(User::class, 'subscriber', 'id');
    }

    public function sub()
    {
        return $this->belongsTo(subscriptions::class, 'subscription', 'id');
    }
}
