<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $table = 'photos';
    protected $primaryKey = 'id';

    protected $fillable = [
    	'id', 'route', 'idAnnouncement',
    ];

    public function announcement(){
    	return $this->belongsTo('App\Announcement','idAnnouncement','id');
    }
}
