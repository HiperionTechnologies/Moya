<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $primaryKey = 'id';

    protected $fillable = [
    	'id', 'name', 'comment', 'idEvent',
    ];

    public function event(){
    	return $this->belongsTo('App\Event','idEvent','id');
    }
}
