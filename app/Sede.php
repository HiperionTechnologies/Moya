<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sede extends Model
{
    protected $table = 'sedes';
    protected $primaryKey = 'id';

    protected $fillable = [
    	'id', 'city',
    ];

    public function announcements(){
    	return $this->hasMany('App\Announcement','idSede');
    }

    public function events(){
    	return $this->hasMany('App\Event','idSede');
    }

    public function ubications(){
        return $this->hasMany('App\Ubication','idSede');
    }
}
