<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    protected $table = 'statistics';
    protected $primaryKey = 'id';

    protected $fillable = [
    	'id', 'name', 'description',
    ];

    public function images(){
    	return $this->hasMany('App\ImageStatistic','idStatistic');
    }
}
