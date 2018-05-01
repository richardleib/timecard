<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use SoftDeletes;

    protected $table = 'invoices';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'client_id',
        'user_id',
        'team_id',
        'title',
        'description',
        'hours_logged',
        'total',
        'paid_at',
    ];

    public function client() {
        return $this->belongsTo('App\Client', 'client_id', 'id');
    }

    public function user() {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    // TODO: Add team relationship

    public function projects() {
        return $this->belongsToMany('App\Project', 'invoice_projects');
    }

    public function scopePaid($query) {
        return $query->whereNotNull('paid_at');
    }

    public function scopeUnpaid($query) {
        return $query->whereNull('paid_at');
    }
}
