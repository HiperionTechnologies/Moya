<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';
    protected $primaryKey = 'id';

    protected $fillable = [
    	'id', 'name', 'description', 'idSede', 'exhibitor',
    ];

    public function dates(){
    	return $this->hasMany('App\Date','idEvent');
    }

    public function gallery(){
    	return $this->hasMany('App\Gallery','idEvent');
    }

    public function comments(){
    	return $this->hasMany('App\Comment','idEvent');
    }

    public function ubication(){
    	return $this->hasOne('App\Ubication','idEvent');
    }

    public function edition(){
    	return $this->hasOne('App\Edition','idEvent');
    }

    public function sede(){
    	return $this->belongsTo('App\Sede','idSede','id');
    }
}
