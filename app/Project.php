<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDelete;

class Project extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'client_id',
        'name',
        'description',
        'hours_logged',
    ];
    
    public function client() {
        return $this->belongsTo('App\Client', 'client_id', 'id');
    }

    public function users() {
        return $this->belongsToMany('App\User', 'project_users');
    }
}
