<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = 'galleries';
    protected $priamryKey = 'id';

    protected $fillable = [
    	'id', 'route', 'idEvent',
    ];

    public function event(){
    	return $this->belongsTo('App\Event','idEvent','id');
    }
}
