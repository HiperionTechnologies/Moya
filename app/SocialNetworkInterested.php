<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialNetworkInterested extends Model
{
    protected $table = 'social_network_interesteds';
    protected $primaryKey = 'id';

    protected $fillable = [
    	'id', 'link', 'idInterested',
    ];

    public function interested(){
    	return $this->belongsTo('App\Interested','idInterested','id');
    }
}
