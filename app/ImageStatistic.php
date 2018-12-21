<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageStatistic extends Model
{
    protected $table = 'image_statistics';
    protected $primaryKey = 'id';

    protected $fillable = [
    	'id', 'route', 'idStatistic',
    ];

    public function statistic(){
    	return $this->belongsTo('App\Statistic','idStatistic','id');
    }
}