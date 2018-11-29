<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialNetwork extends Model
{
    protected $table = 'social_networks';
    protected $primaryKey = 'id';

    protected $fillable = [
    	'id', 'link', 'idAnnouncement',
    ];

    public function announcement(){
    	return $this->belongsTo('App\Announcement','idAnnouncement','id');
    }
}
