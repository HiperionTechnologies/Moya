<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ubication extends Model
{
    protected $table = 'ubications';
    protected $primaryKey = 'id';

    protected $fillable = [
    	'id', 'name', 'street', 'number', 'colony', 'idSede', 'latitude', 'longitude',
    ];

    public function events(){
    	return $this->hasMany('App\Event','idUbication');
    }

    public function sede(){
    	return $this->belongsTo('App\Sede','idSede','id');
    }
}
