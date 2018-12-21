<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interested extends Model
{
    protected $table = 'interesteds';
    protected $primaryKey = 'id';

    protected $fillable = [
    	'id', 'name', 'email', 'phone',
    ];

    public function socialNetworks(){
    	return $this->hasMany('App\SocialNetworkInterested','idInterested');
    }
}
