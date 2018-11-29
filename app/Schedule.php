<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 'schedules';
    protected $primaryKey = 'id';

    protected $fillable = [
    	'id', 'time', 'idDate',
    ];

    public function itineraries(){
    	return $this->hasMany('App\Itinerary','idSchedule');
    }

    public function date(){
    	return $this->belongsTo('App\Date','idDate','id');
    }
}
