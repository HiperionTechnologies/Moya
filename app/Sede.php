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
    	return $this->hasMany('App\Announcement','idCategory');
    }

    public function events(){
    	return $this->hasMany('App\Event','idSede');
    }
}
