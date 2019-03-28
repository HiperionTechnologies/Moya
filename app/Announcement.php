<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $table = 'announcements';
    protected $primaryKey = 'id';

    protected $fillable = [
    	'id', 'first_name', 'last_name', 'phone', 'brand', 'description', 'image', 'answer_moya', 'organic', 'local', 'artesanal', 'furniture', 'special_furniture', 'idSede', 'idCategory',
    ];

    public function photos(){
    	return $this->hasMany('App\Photo','idAnnouncement');
    }

    public function socialNetworks(){
    	return $this->hasMany('App\SocialNetwork','idAnnouncement');
    }

    public function sede(){
    	return $this->belongsTo('App\Sede','idSede','id');
    } 

    public function category(){
    	return $this->belongsTo('App\Category','idCategory','id');
    } 
}
