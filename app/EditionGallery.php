<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EditionGallery extends Model
{
    protected $table = 'edition_galleries';
    protected $priamryKey = 'id';

    protected $fillable = [
    	'id', 'route', 'idEdition',
    ];

    public function edition(){
    	return $this->belongsTo('App\Edition','idEdition','id');
    }
}
