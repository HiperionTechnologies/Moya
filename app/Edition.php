<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Edition extends Model
{
    protected $table = 'editions';
    protected $primaryKey = 'id';

    protected $fillable = [
    	'id', 'name', 'description', 'idEvent',
    ];

    public function event(){
    	return $this->belongsTo('App\Event','idEvent','id');
    }

    public function gallery(){
    	return $this->hasMany('App\EditionGallery','idEvent');
    }
}
