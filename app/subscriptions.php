<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subscriptions extends Model
{
    protected $guarded = [];


    public function subscribedby()
    {
        return $this->belongsTo(User::class, 'subscriber', 'id');
    }

    public function plan()
    {
        return $this->belongsTo(plans::class, 'plan_name', 'id');
    }

}
