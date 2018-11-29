<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Itinerary extends Model
{
    protected $table = 'itineraries';
    protected $primaryKey = 'id';

    protected $fillable = [
    	'id', 'time', 'itinerary', 'idSchedule',
    ];

    public function schedule(){
    	return $this->belongsTo('App\Schedule','idSchedule','id');
    }
}
