<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ubication extends Model
{
    protected $table = 'ubications';
    protected $primaryKey = 'id';

    protected $fillable = [
    	'id', 'street', 'number', 'colony', 'idSede', 'latitude', 'longitude', 'idEvent',
    ];

    public function event(){
    	return $this->belongsTo('App\Event','idEvent','id');
    }

    public function sede(){
    	return $this->belongsTo('App\Sede','idSede','id');
    }
}
