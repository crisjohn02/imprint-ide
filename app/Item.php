<?php

namespace App;

use App\Traits\HasUser;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Item extends Model
{
    use HasUuid, HasUser, LogsActivity;

    protected $guarded = [];

    protected $hidden = ['id'];

    protected static $logOnlyDirty = true;

    protected static $logUnguarded = true;

    protected $dates = [
        'launched_at',
        'closed_at'
    ];

    protected $casts = [
        'config' => 'object',
        'isActive' => 'boolean'
    ];

    public function project()
    {
        return $this->belongsTo('App\Project', 'project_id', 'uuid');
    }
}
