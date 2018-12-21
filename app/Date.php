<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    protected $table = 'dates';
    protected $priamryKey = 'id';

    protected $fillable = [
    	'id', 'date', 'idEvent',
    ];

    public function schedules(){
    	return $this->hasMany('App\Schedule','idDate');
    }

    public function event(){
    	return $this->belongsTo('App\Event','idEvent','id');
    }
}
