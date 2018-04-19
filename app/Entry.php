<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Entry extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'user_id',
        'project_id',
        'started_at',
        'ended_at',
        'hours',
        'description',
        'notes',
    ];

    public function user() {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function project() {
        return $this->belongsTo('App\Project', 'project_id', 'id');
    }
}
