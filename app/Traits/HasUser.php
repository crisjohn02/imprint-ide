<?php
namespace App\Traits;

trait HasUser
{
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'uuid');
    }
}