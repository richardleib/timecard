<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDelete;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable, SoftDelete;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'email',
       'username',
       'password',
       'name',
       'avatar_media_id',
       'bio',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function clients() {
        return $this->belongsToMany('App\Client', 'client_users');
    }

    public function projects() {
        return $this->belongsToMany('App\Project', 'project_users');
    }

    public function entries() {
        return $this->hasMany('App\Entry', 'project_id', 'id');
    }
}
