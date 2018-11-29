<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Edition extends Model
{
    protected $table = 'editions';
    protected $primaryKey = 'id';

    protected $fillable = [
    	'id', 'description', 'idEvent',
    ];

    public function event(){
    	return $this->belongsTo('App\Event','idEvent','id');
    }
}
