<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';
    protected $primaryKey = 'id';

    protected $fillable = [
    	'id', 'name', 'description', 'image', 'idUbication',
    ];

    public function dates(){
    	return $this->hasMany('App\Date','idEvent');
    }

    public function gallery(){
    	return $this->hasMany('App\Gallery','idEvent');
    }

    public function ubication(){
        return $this->belongsTo('App\Ubication','idUbication','id');
    }

    public function edition(){
    	return $this->hasMany('App\Edition','idEvent');
    }
}
