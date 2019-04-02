<?php

namespace App;

use App\Traits\HasUser;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Project extends Model
{
    use HasUuid, SoftDeletes, LogsActivity, HasUser;

    protected $guarded = [];

    protected $hidden = ['id'];

    protected static $logOnlyDirty = true;

    protected static $logUnguarded = true;

    protected $casts = [
        'config' => 'object',
        'isActive' => 'boolean',
        'shared' => 'boolean'
    ];

    public function items()
    {
        return $this->hasMany('App\Item', 'project_id', 'uuid');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'uuid');
    }
}
